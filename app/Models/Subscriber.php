<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
