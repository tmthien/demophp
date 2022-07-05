<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function active($active = 0): string
    {
        return $active == 1 ? 
        '<span style="color:#25a923">
            <i class="fa-solid fa-circle-check"></i>
        </span>' : 
        '<span style="color:#f05d5d">
            <i class="fa-solid fa-circle-xmark"></i>
        </span>';
    }
}
