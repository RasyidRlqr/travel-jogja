<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests and exclude admin routes
        if ($request->isMethod('get') && !$request->is('admin/*')) {
            $page = $request->path() ?: 'home';

            // Simple rate limiting - don't track the same IP for the same page within 1 hour
            $existingView = PageView::where('page', $page)
                ->where('ip_address', $request->ip())
                ->where('created_at', '>', now()->subHour())
                ->exists();

            if (!$existingView) {
                PageView::recordView($page);
            }
        }

        return $response;
    }
}