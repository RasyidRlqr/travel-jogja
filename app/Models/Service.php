<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image',
        'image_url',
    ];

    /**
     * Get the image source (URL or local file)
     */
    public function getImageSourceAttribute()
    {
        return $this->image_url ?: ($this->image ? asset('storage/' . $this->image) : null);
    }
}
