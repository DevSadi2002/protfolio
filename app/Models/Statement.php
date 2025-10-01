<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Translatable\HasTranslations;

class Statement extends Model
{
    //
    use HasFactory, HasTranslations;
    protected $fillable = [
        'about_id',
        'key',
        'value'
    ];

    protected $casts = [
        'key' => 'array',
        'value' => 'array'
    ];
    public $translatable = [
        'key',
        'value'
    ];
    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
