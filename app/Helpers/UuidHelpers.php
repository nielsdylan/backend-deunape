<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UuidHelper
{
    public static function generarUuidUnico(string $tabla): string
    {
        do {
            $uuid = (string) Str::uuid();
            $existe = DB::table($tabla)->where('uuid', $uuid)->exists();
        } while ($existe);

        return $uuid;
    }
}
