<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeVideoController extends Controller
{
    public function index()
    {
        $homeVideo = HomeVideo::first();

        if ($homeVideo) {
            return view('admin.home-videos.index', compact('homeVideo'));
        }

        return redirect()->route('admin.home-videos.create');
    }

    public function create()
    {
        $homeVideo = HomeVideo::first();

        if ($homeVideo) {
            return redirect()->route('admin.home-videos.edit', $homeVideo);
        }

        return view('admin.home-videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required|mimes:mp4,webm,ogv|max:51200', // 50MB max
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle video file upload
        if ($request->hasFile('video')) {
            $videoPath = $this->handleVideoUpload($request->file('video'), 'videos');
            $data['video_path'] = $videoPath;
        }

        HomeVideo::create($data);

        // Clear homepage cache
        Cache::forget('homepage_data');

        return redirect()->route('admin.home-videos.index')
            ->with('success', 'Home video created successfully.');
    }

    public function show(HomeVideo $homeVideo)
    {
        return view('admin.home-videos.index', compact('homeVideo'));
    }

    public function edit(HomeVideo $homeVideo)
    {
        return view('admin.home-videos.edit', compact('homeVideo'));
    }

    public function update(Request $request, HomeVideo $homeVideo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,webm,ogv|max:51200', // 50MB max
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle video file upload
        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($homeVideo->video_path) {
                $this->deleteVideo($homeVideo->video_path, 'videos');
            }

            $videoPath = $this->handleVideoUpload($request->file('video'), 'videos');
            $data['video_path'] = $videoPath;
        } else {
            // Keep existing video if no new file uploaded
            unset($data['video_path']);
        }

        $homeVideo->update($data);

        // Clear homepage cache
        Cache::forget('homepage_data');

        return redirect()->route('admin.home-videos.index')
            ->with('success', 'Home video updated successfully.');
    }

    public function destroy(HomeVideo $homeVideo)
    {
        // Delete video file
        if ($homeVideo->video_path) {
            $this->deleteVideo($homeVideo->video_path, 'videos');
        }

        $homeVideo->delete();

        // Clear homepage cache
        Cache::forget('homepage_data');

        return redirect()->route('admin.home-videos.index')
            ->with('success', 'Home video deleted successfully.');
    }
}
