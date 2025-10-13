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
        'images',
        'featured'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price);
    }

    public function getImageAttribute()
    {
        return $this->images ? $this->images[0] : null;
    }
}
