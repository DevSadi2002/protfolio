<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        // Experiences
        'title',
        'company',
        'company_links',
        'location',
        'start_date',
        'end_date',

        'description_title',
        'description',
    ];


    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
