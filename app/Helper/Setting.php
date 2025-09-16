<?php

namespace App\Helper;

use App\Models\Setting as ModelsSetting;

class Setting
{
    public static function Settings()
    {
        return ModelsSetting::first();
    }
}
