<?php

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

var_dump($singleton1 === $singleton2); // true

?>
