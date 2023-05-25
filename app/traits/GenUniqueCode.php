<?php

namespace App\traits;

use Illuminate\Support\Facades\DB;
trait GenUniqueCode{
    public function GenUniqueCode()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        $codeLength = 8;

        do {
            $code = '';
            for ($i = 0; $i < $codeLength; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while (DB::table('codes')->where('code', $code)->exists());

        return $code;     }
}
