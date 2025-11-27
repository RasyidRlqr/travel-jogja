<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'image_url',
        'description',
        'category',
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
        return 'https://via.placeholder.com/400x300/dc3545/ffffff?text=Gallery+Image';
    }
}
