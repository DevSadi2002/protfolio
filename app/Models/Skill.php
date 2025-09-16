<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    //
    use HasFactory;

    protected $table = 'skills';
    protected $fillable = [
        'name',
        'icon'
    ];


    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
