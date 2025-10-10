<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    /**
     * Clear all application cache
     */
    public function clearAll(Request $request)
    {
        try {
            // Clear application cache
            Cache::flush();

            // Clear config cache
            Artisan::call('config:clear');

            // Clear route cache
            Artisan::call('route:clear');

            // Clear view cache
            Artisan::call('view:clear');

            // Clear compiled files
            Artisan::call('clear-compiled');

            return redirect()->back()->with('success', 'All caches have been cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error clearing cache: ' . $e->getMessage());
        }
    }

    /**
     * Clear application cache only
     */
    public function clearAppCache(Request $request)
    {
        try {
            Cache::flush();

            return redirect()->back()->with('success', 'Application cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error clearing application cache: ' . $e->getMessage());
        }
    }

    /**
     * Clear config cache
     */
    public function clearConfigCache(Request $request)
    {
        try {
            Artisan::call('config:clear');

            return redirect()->back()->with('success', 'Configuration cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error clearing config cache: ' . $e->getMessage());
        }
    }

    /**
     * Clear route cache
     */
    public function clearRouteCache(Request $request)
    {
        try {
            Artisan::call('route:clear');

            return redirect()->back()->with('success', 'Route cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error clearing route cache: ' . $e->getMessage());
        }
    }

    /**
     * Clear view cache
     */
    public function clearViewCache(Request $request)
    {
        try {
            Artisan::call('view:clear');

            return redirect()->back()->with('success', 'View cache cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error clearing view cache: ' . $e->getMessage());
        }
    }

    /**
     * Optimize application (cache routes, config, and views)
     */
    public function optimize(Request $request)
    {
        try {
            // Clear all caches first
            Cache::flush();
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');

            // Then optimize
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');

            return redirect()->back()->with('success', 'Application optimized successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error optimizing application: ' . $e->getMessage());
        }
    }
}

