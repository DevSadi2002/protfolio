<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statement extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'key',
        'value'
    ];

    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
