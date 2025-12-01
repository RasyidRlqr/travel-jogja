<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = [
        'page',
        'ip_address',
        'user_agent',
    ];

    public static function recordView($page)
    {
        return static::create([
            'page' => $page,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    public static function getTotalViews()
    {
        return static::count();
    }

    public static function getTodayViews()
    {
        return static::whereDate('created_at', today())->count();
    }

    public static function getTopPages($limit = 10)
    {
        return static::select('page')
            ->selectRaw('COUNT(*) as views')
            ->groupBy('page')
            ->orderBy('views', 'desc')
            ->limit($limit)
            ->get();
    }

    public static function getViewsLastDays($days)
    {
        return static::where('created_at', '>=', now()->subDays($days))->count();
    }

    public static function getUniqueViewsLastDays($days)
    {
        return static::where('created_at', '>=', now()->subDays($days))
            ->distinct('ip_address')
            ->count('ip_address');
    }

    public static function getViewsLastDay()
    {
        return static::getViewsLastDays(1);
    }

    public static function getViewsLastWeek()
    {
        return static::getViewsLastDays(7);
    }

    public static function getViewsLastMonth()
    {
        return static::getViewsLastDays(30);
    }

    public static function getViewsLast5Months()
    {
        return static::getViewsLastDays(150);
    }

    public static function getViewsLastYear()
    {
        return static::getViewsLastDays(365);
    }
}