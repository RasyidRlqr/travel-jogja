<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration_days',
        'price',
        'itinerary',
        'includes',
        'excludes',
        'image',
        'image_url',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the image source (URL or local file) with fallback
     */
    public function getImageSourceAttribute()
    {
        // Priority: image_url > image > default placeholder
        if ($this->image_url) {
            return $this->image_url;
        }

        if ($this->image) {
            $path = storage_path('app/public/' . $this->image);
            if (file_exists($path)) {
                return asset('storage/' . $this->image);
            }
        }

        // Default fallback image
        return 'https://via.placeholder.com/400x250/28a745/ffffff?text=Tour+Image';
    }
}
