<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    //
    use HasFactory, HasTranslations;
    protected $fillable = [
        'name',
        'project_skills',
        'status',
        'is_important',
        'image',
        'description',
        'githup',
        'links'
    ];

    protected $casts = [
        'project_skills' => 'array',
        'description' => 'array'
    ];

    public $translatable = ['description'];
}
