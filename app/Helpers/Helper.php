<?php
namespace App\Helpers;

class Helper {
    public static function uploadFile($key, $path) {
        request()->file($key)->store($path);
        return request()->file($key)->hashName();
    }
}


/**
 * Created by PhpStorm.
 * User: const
 * Date: 18-01-2019
 * Time: 11:04
 */
