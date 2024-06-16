<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'content',
    ];




    protected function image(): attribute
    {
        return attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
    }
}
