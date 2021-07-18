<?php
// The goal of this file is to get the url requested by the user.

class Request
{
    public $url;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }
}