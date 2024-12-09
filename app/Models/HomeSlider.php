<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $fillable = [
        'photo',
        'position',
        'title',
        'subtitle',
        'offer',
        'published',
        'link'
    ];
}
