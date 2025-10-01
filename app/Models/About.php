<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    //
    use HasFactory, HasTranslations;

    protected $fillable = [

        // Educations

        'degree',
        'institution',
        'achievements',



        // // Skills (Tech Stack)

        // 'name',
        // 'icon',
    ];

    protected $casts = [
        'degree' => 'array',
        'institution' => 'array',
        'achievements' => 'array',
    ];

    public $translatable = [
        'degree',
        'institution',
        'achievements',
    ];


    public function statements(): HasMany
    {
        return $this->hasMany(Statement::class);
    }
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function experience(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
    public static function booted()
    {
        static::creating(function ($about) {
            // إذا وجد سجل مسبقًا، امنع الإنشاء
            if (self::exists()) {
                throw new \Exception('يمكن إنشاء سجل واحد فقط لصفحة التوصيف.');
            }
        });
    }
}
