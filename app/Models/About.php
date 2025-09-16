<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class About extends Model
{
    //
    use HasFactory;

    protected $fillable = [

        // Educations

        'degree',
        'institution',
        'achievements',

        // Experiences

        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',

        // Skills (Tech Stack)

        'name',
        'icon',
    ];

    protected $casts = [
        'achievements' => 'array'
    ];

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
}
