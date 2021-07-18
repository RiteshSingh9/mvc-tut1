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
        require(ROOT."Config/Config.php");
        $basePath=$config['dev']['basePath'];
        $url = trim($url);
        if ($url == $basePath) {
            // show home page
            $request->controller = "page";
            $request->action = "home";
            $request->params = ['title' => "Home Page"];

        } elseif ($url == $basePath."home") {
            // show Home page
            $request->controller = "page";
            $request->action = "home";
            $request->params = ['title' => "Home Page"];

        } elseif ($url == $basePath."about") {
            // show about page
            $request->controller = "page";
            $request->action = "about";
            $request->params = ['title' => "About Page"];

        } elseif ($url == $basePath."services") {
            // show services page
            $request->controller = "page";
            $request->action = "services";
            $request->params = ['title' => "Services Page"];

        } elseif ($url == $basePath."task") {
            // index page for tasks
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } 
        elseif ($url == $basePath."task/create") {
            // show create task page
            $request->controller = "tasks";
            $request->action = "create";
            $request->params = ['title'=>"Create Task"];

        } else {
            $explode_url = explode('/', $url);
            $request->controller = "page";
            $request->action = "notFound";
            $request->params = array_slice($explode_url, 2);
        }
    }

}
