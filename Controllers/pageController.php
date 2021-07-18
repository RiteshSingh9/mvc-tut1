<?php

class pageController extends Controller
{
    /**
     * This class will show th pages like Home, About, Service, etc.
     */
    public function home($params)
    {
        // we don't want to pass data to view
        $d['title'] = $params['title'];
        $this->set($d);
        $this->render("../pages/home");
    }
    public function about($params)
    {
        $d['title'] = $params['title'];
        $this->set($d);
        $this->render("../pages/about");
    }
    public function services($params)
    {
        $d['title'] = $params['title'];
        $this->set($d);
        $this->render("../pages/services");
    }
    public function notFound($params)
    {
        $d['title'] = "404 Not Found";
        $d['msg'] = $params;
        $this->set($d);
        $this->render("../errors/404");
    }
}