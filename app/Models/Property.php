<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'address',
        'city',
        'state',
        'zip_code',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'main_image',
        'images',
        'featured'
    ];

    protected $casts = [
        'images' => 'array',
        'featured' => 'boolean'
    ];

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price);
    }

    // For public folder access
    public function getMainImageUrlAttribute()
    {
        if (!$this->main_image) {
            return asset('images/default-property.jpg');
        }

        // For public folder - use direct asset path
        return asset($this->main_image);
    }

    public function getImagesUrlsAttribute()
    {
        if (!$this->images || !is_array($this->images)) {
            return [];
        }

        return array_map(function ($image) {
            return asset($image);
        }, $this->images);
    }

    public function getAllImagesUrlsAttribute()
    {
        $allImages = [];

        if ($this->main_image) {
            $allImages[] = $this->getMainImageUrlAttribute();
        }

        $carouselUrls = $this->getImagesUrlsAttribute();
        foreach ($carouselUrls as $url) {
            // Don't duplicate if main image is also in carousel
            if ($this->main_image && asset($this->main_image) !== $url) {
                $allImages[] = $url;
            }
        }

        return $allImages;
    }
}
