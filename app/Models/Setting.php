<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    use HasFactory;

    protected $table = 'settings';
    // protected $guarded  = [];

    protected $fillable = [
        'description',
        'email',
        'job',
        'link_job',
        'compane_job',
        'instgram',
        'linkedin',
        'githup',
        'whatsapp',
        'telegram',
        'copyright_holder',
        'copyright_start',
        'copyright_end',
    ];
    // protected $casts = [
    //     'social_links' => 'array', // يحول JSON إلى Array تلقائي
    // ];
    public static function booted()
    {
        static::creating(function ($setting) {
            // إذا وجد سجل مسبقًا، امنع الإنشاء
            if (self::exists()) {
                throw new \Exception('يمكن إنشاء سجل واحد فقط للـ Settings.');
            }
        });
    }
}
