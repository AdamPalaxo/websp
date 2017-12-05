<?php

session_start();

mb_internal_encoding("UTF-8");

function autoload($class)
{
    if (preg_match('/Controller$/', $class))
        require("controller/" . $class . ".php");
    else
        require("model/" . $class . ".php");
}

spl_autoload_register("autoload");

Db::connect("127.0.0.1", "kivweb", "root", "");

$router = new RouterController();
$router->process(array($_SERVER['REQUEST_URI']));

$router->showView();

