<?php

use App\Controllers\Controller;
use App\Core\Response;

session_start();

require_once "./vendor/autoload.php";

define("APP_NAME", "PHARMACY");
define("APP_URL", "http://pharm.test/");
define("DS", DIRECTORY_SEPARATOR);
define('ASSETS', APP_URL.'assets/');

define('LOGIN', '/');
define('AUTH', APP_URL.'user/auth');
define("DASHBOARD", "/user/dashboard");


function view($view, $data = null)
{
    $contoller = new Controller;
    $permitted = $contoller->permit($view);

    if ($permitted) {
        $viewsFolder = "App/Views/";

        if ($view === 'login') {
            $layout =  "App/Layouts/auth.php";
        } else {
            $layout =  "App/Layouts/main.php";
        }
        
        $view = $viewsFolder.$view.'.php';

        if (!file_exists($view)) {
            return 'page not found';
        }

        ob_start();
        include_once $view;
        $view = ob_get_clean();

        ob_start();
        include_once $layout;
        $layout = ob_get_clean();

        return str_replace("{{content}}", $view, $layout);
    }
    Response::code(404);
    return "<h1>Page not found</h1>";
}
