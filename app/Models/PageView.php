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
}