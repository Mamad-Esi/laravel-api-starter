<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'home_description',
        'Phone',
        'address',
        'email',
        'social_media',
        'about_experience',
        'about_education',
        'footer_title',
        'footer_description'
    ];

    protected $casts = [
        'social_media' => 'array',
        'about_experience' => 'array',
        'about_education' => 'array'
    ];

}