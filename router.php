<?php

/**
 * The router takes the url captured by the request.php and explode the url 
 * into 3 different parts on the “/” character :
 * 
 */

class Router
{
    public static function parse($url, $request)
    {
        require(ROOT . "Config/Config.php");
        require(ROOT . "libs/route.php");

        $basePath = $config['dev']['basePath'];
        $routeHandler = new Route();

        $url = trim($url);
        $arr = explode('/', $url);
        $action = $arr[2];
        $params = ['title' => ucfirst($action) . " Page"];
        $e = $routeHandler->route($url, $path = "home", "page", "home", $request, $params);
        if (!$e) {
            $arr = explode('/', $url);

            if ($arr[2] == 'task') {
                $path = "task";
                $action = "index";
                // $params = ['title' => ucfirst($action) . " Page"];

                if (isset($arr[3])) {
                    $action = $arr[3];
                    $path .= "/" . $action;
                }
                if (isset($arr[4])) {
                    $id = $arr[4];
                    $path .= '/' . $id;
                    $params['key'] = array(
                        "id" => $arr[4],
                    );
                }
                $params['title'] = ucfirst($action) . " Page";
                $routeHandler->route($url, $path = $path, "task", $action, $request, $params);
            } else {
                $action = $path = $arr[2]; // action and path will be same due to same name;
                $params = ['title' => ucfirst($action) . " Page"];
                $routeHandler->route($url, $path = $path, "page", $action, $request, $params);
            }
        }


        /**
         * Method 3 (old method)
        switch ($url) {
            case $basePath:
                $request->controller = "page";
                $request->action = "home";
                $request->params = ['title' => "Home Page"];
                break;

            case $basePath . "home":
                $request->controller = "page";
                $request->action = "home";
                $request->params = ['title' => "Home Page"];
                break;

            case $basePath . "about":
                $request->controller = "page";
                $request->action = "about";
                $request->params = ['title' => "About Page"];
                break;

            case $basePath . "services":
                $request->controller = "page";
                $request->action = "services";
                $request->params = ['title' => "Services Page"];
                break;

            case $basePath . "task":
                $request->controller = "tasks";
                $request->action = "index";
                $request->params = [];
                break;

            case $basePath . "task/create":
                $request->controller = "tasks";
                $request->action = "create";
                $request->params = ['title' => "Create Task"];
                break;

            default:
                $explode_url = explode('/', $url);
                $request->controller = "page";
                $request->action = "notFound";
                $request->params = array_slice($explode_url, 2);
                break;
        }

         */
    }
}
