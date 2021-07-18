<?php

class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        // check if there is no existing connection
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=todo_MVC", 'root', '');
        }
        return self::$bdd;
    }
}
?>