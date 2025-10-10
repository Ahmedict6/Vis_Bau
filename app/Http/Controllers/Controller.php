<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Handle image upload with resizing and optimization
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param array $sizes
     * @return array
     */
    protected function handleImageUpload($file, $directory, $sizes = [])
    {
        // Default sizes if not provided
        if (empty($sizes)) {
            $sizes = [
                'original' => ['width' => null, 'height' => null],
                'large' => ['width' => 800, 'height' => 600],
                'medium' => ['width' => 400, 'height' => 300],
                'small' => ['width' => 200, 'height' => 150],
                'thumb' => ['width' => 100, 'height' => 100],
            ];
        }

        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9\-\._]/', '', $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $originalName = pathinfo($filename, PATHINFO_FILENAME);

        $uploadedFiles = [];

        // Create ImageManager with GD driver
        $manager = new ImageManager(new Driver());

        foreach ($sizes as $sizeName => $dimensions) {
            $width = $dimensions['width'];
            $height = $dimensions['height'];

            // Create image instance
            $image = $manager->read($file);

            // Resize if dimensions are specified
            if ($width && $height) {
                $image->cover($width, $height);
            }

            // Generate filename for this size
            if ($sizeName === 'original') {
                $sizeFilename = $filename;
            } else {
                $sizeFilename = $originalName . '_' . $sizeName . '.' . $extension;
            }

            // Ensure directory exists
            $path = public_path('assets/img/' . $directory);
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            // Save the image with quality setting
            $image->save($path . '/' . $sizeFilename, quality: 90);

            $uploadedFiles[$sizeName] = $sizeFilename;
        }

        return $uploadedFiles;
    }

    /**
     * Delete images from storage
     *
     * @param string|array $images
     * @param string $directory
     * @return void
     */
    protected function deleteImages($images, $directory)
    {
        if (!$images) return;

        if (!is_array($images)) {
            $images = [$images];
        }

        foreach ($images as $image) {
            if (!$image) continue;

            $path = public_path('assets/img/' . $directory . '/' . $image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /**
     * Handle multiple image uploads for galleries
     *
     * @param array $files
     * @param string $directory
     * @param array $sizes
     * @return array
     */
    protected function handleMultipleImageUploads($files, $directory, $sizes = [])
    {
        $uploadedImages = [];

        if (!$files || !is_array($files)) {
            return $uploadedImages;
        }

        foreach ($files as $file) {
            if ($file && $file->isValid()) {
                $uploadedFiles = $this->handleImageUpload($file, $directory, $sizes);
                $uploadedImages[] = $uploadedFiles['original']; // Store original filename
            }
        }

        return $uploadedImages;
    }
}
