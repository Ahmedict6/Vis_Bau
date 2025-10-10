<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\SectionSetting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Check if Blog Posts section is active
        if (!SectionSetting::isSectionActive('blog_posts')) {
            abort(404, 'Blog section is currently unavailable.');
        }

        $query = BlogPost::query()->where('is_published', true);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $blogPosts = $query->orderBy('published_at', 'desc')->paginate(9);

        // Get categories for filter dropdown
        $categories = BlogPost::where('is_published', true)
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        return view('blog.index', compact('blogPosts', 'categories'));
    }

    public function show(BlogPost $post)
    {
        // Check if Blog Posts section is active
        if (!SectionSetting::isSectionActive('blog_posts')) {
            abort(404, 'Blog section is currently unavailable.');
        }

        if (!$post->is_published) {
            abort(404);
        }

        $relatedPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
