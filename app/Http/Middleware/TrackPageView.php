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

        // Only track GET requests for home page (/) and exclude admin routes
        if ($request->isMethod('get') && !$request->is('admin/*') && $request->is('/')) {
            $page = '/';

            // Track unique IPs per day - don't track the same IP for the home page within the same day
            $existingView = PageView::where('page', $page)
                ->where('ip_address', $request->ip())
                ->whereDate('created_at', today())
                ->exists();

            if (!$existingView) {
                PageView::recordView($page);
            }
        }

        return $response;
    }
}