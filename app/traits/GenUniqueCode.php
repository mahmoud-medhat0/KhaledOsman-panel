<?php

namespace App\traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
trait GenUniqueCode{
    public function GenUniqueCode()
    {
        $code = Str::random(8);
        while (DB::table('codes')->where('code', $code)->exists()) {
            $code = Str::random(8);
        }
        return $code;
    }
}
