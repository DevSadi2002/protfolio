<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'project_skills',
        'image',
        'description',
        'githup',
        'links'
    ];

    protected $casts = [
        'project_skills' => 'array',
    ];
}
