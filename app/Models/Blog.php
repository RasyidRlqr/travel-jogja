<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'image_url',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the image source (URL or local file) with fallback
     */
    public function getImageSourceAttribute()
    {
        // Priority: image_url > featured_image > default placeholder
        if ($this->image_url) {
            return $this->image_url;
        }

        if ($this->featured_image) {
            $path = storage_path('app/public/' . $this->featured_image);
            if (file_exists($path)) {
                return asset('storage/' . $this->featured_image);
            }
        }

        // Default fallback image - using a placeholder service
        return 'https://via.placeholder.com/400x250/6c757d/ffffff?text=No+Image';
    }

    /**
     * Get image source with specific size/fallback
     */
    public function getImageUrl($size = null)
    {
        $source = $this->image_source;

        // If it's a local file and size is specified, we could add resize logic here
        // For now, just return the source
        return $source;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
