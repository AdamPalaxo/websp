
<?php

session_start();

mb_internal_encoding("UTF-8");

function autoload($class)
{
    if (preg_match('/Controller$/', $class))
    {
        require("controller/" . $class . ".php");
    }
    else
    {
        require("model/" . $class . ".php");
    }
}

spl_autoload_register("autoload");

Db::connect("127.0.0.1", "kivweb", "root", "");

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    $router = new AjaxController();
    $router->process(array($_SERVER['REQUEST_URI']));
}
else
{
    $router = new URLController();
    $router->process(array($_SERVER['REQUEST_URI']));

    $router->renderView();
}

