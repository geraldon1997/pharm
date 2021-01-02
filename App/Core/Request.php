<?php
namespace App\Core;

class Request
{
    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function isGet()
    {
        return self::method() === 'get' ? true : false;
    }

    public static function isPost()
    {
        return self::method() === 'post' ? true : false;
    }

    public static function path()
    {
        $url = $_SERVER['REQUEST_URI'];
        $query = strpos($url, '?');

        if ($query) {
            return substr($url, 0, $query);
        }

        return $url;
    }
}
