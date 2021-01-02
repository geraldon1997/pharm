<?php
namespace App\Core;

class Response
{
    public static function code($code = null)
    {
        return http_response_code($code);
    }

    public static function redirect($url, $params = null)
    {
        return empty($params) ? header('location:'.$url) : header('location:'.$url.DS.$params);
    }
}
