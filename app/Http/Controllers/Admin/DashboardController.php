<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic statistics
        $stats = [
            'blogs' => Blog::count(),
            'services' => Service::count(),
            'tours' => Tour::count(),
            'galleries' => Gallery::count(),
            'users' => \App\Models\User::count(),
            'total_views' => \App\Models\PageView::count(),
            'today_views' => \App\Models\PageView::getViewsLastDay(),
            'week_views' => \App\Models\PageView::getViewsLastWeek(),
            'month_views' => \App\Models\PageView::getViewsLastMonth(),
            'five_month_views' => \App\Models\PageView::getViewsLast5Months(),
            'year_views' => \App\Models\PageView::getViewsLastYear(),
        ];

        // Chart data - last 7 days visits
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $count = \App\Models\PageView::whereDate('created_at', $date)->count();
            $chartData[] = [
                'date' => now()->subDays($i)->format('M d'),
                'views' => $count
            ];
        }

        return view('admin.dashboard', compact('stats', 'chartData'));
    }
}
