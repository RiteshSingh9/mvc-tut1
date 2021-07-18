<?php
// echo ROOT."Config/Config.php";
class Dispatcher
{
    private $request;
    public function __construct()
    {
    }
    public function dispatch()
    {
        /**
         * 
         * dispatches the app
         */
        require(ROOT . "Config/Config.php");
        $basePath = $config['dev']['basePath'];
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], [$this->request->params]);
        /**
         * The call_user_func_array() function is a special way to call an 
         * existing PHP function. It takes a function to call as its first
         * parameter, then takes an array of parameters as its second parameter.
         * 
         */
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';
        if (file_exists($file)) {
            require($file);
        }
        $controller = new $name();
        return $controller;
    }
}
