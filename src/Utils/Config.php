<?php
namespace App\Utils;

class Config
{
    public static function getDB(string $key, ?string $defaultValue = null)
    {
        require(__DIR__ . '/../../config/db.php');
        if (array_key_exists($key, $arr)) {
            return $arr[$key];
        }
        return $defaultValue ?? null;
    }
    public static function getSMTP(string $key, ?string $defaultValue = null)
    {
        require(__DIR__ . '/../../config/smtp.php');
        if (array_key_exists($key, $arr)) {
            return $arr[$key];
        }
        return $defaultValue ?? null;
    }
}