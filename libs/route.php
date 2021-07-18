<?php

class Route
{
    private $basePath;
    public function __construct()
    {
        require(ROOT . "Config/Config.php");
        $this->basePath = $config['dev']['basePath'];
    }
    function route($url, $path, $controller, $action, $req, $params = [])
{
    require(ROOT . "Config/Config.php");

    $basePath = $config['dev']['basePath'];

    switch ($url) {
        case $basePath:
            $req->controller = $controller;
            $req->action = $action;
            $req->params = ['title' => "Home Page"];
            return true;

        case $basePath . $path:
            $req->controller = $controller;
            $req->action = $action;
            $myParam =  $params;
            if (count($params) > 1) {
                $params = $params['key'];
                foreach ($params as $key => $value) {
                    $myParam[$key] = $value;
                }
            }
            $req->params = $myParam;
            return true;

        default:
            $explode_url = explode('/', $url);
            $req->controller = "page";
            $req->action = "notFound";
            $req->params = array_slice($explode_url, 2);
            break;
    }
}
}
