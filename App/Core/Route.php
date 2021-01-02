<?php
namespace App\Core;

class Route
{
    public static $namespace = "App\\Controllers\\";

    public static function init()
    {
        $path = Request::path();

        if (strlen($path) == 1 && $path === '/') {
            $controller = self::$namespace.'User';
            $method = "login";
            return call_user_func([new $controller, $method]);
        }

        $path = trim($path, '/');
        $pathArray = explode('/', $path);
        $controller = self::$namespace.ucfirst($pathArray[0]);

        if (!class_exists($controller)) {
            return 'class not found';
        }

        unset($pathArray[0]);

        if (empty($pathArray)) {
            return 'bad url';
        }

        $method = $pathArray[1];

        if (!method_exists(new $controller, $method)) {
            return 'method not found';
        }

        unset($pathArray[1]);

        $params = empty($pathArray) ? '' : array_values($pathArray);

        return call_user_func([new $controller, $method], $params);
    }
}
