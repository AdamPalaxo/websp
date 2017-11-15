<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 6.11.2017
 * Time: 23:58
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/model/db_web.php');

require_once (__ROOT__.'/../twig/Autoloader.php');
Twig_Autoloader::register();


$conn = new LoginController();


class LoginController
{
    public $db_web;

    public function __construct()
    {
        $this->db_web= new DB_WEB();
        $this->invoke();
    }

    public function invoke()
    {
        $result = $this->db_web->getlogin();

        if($result == 1)
        {
            session_start();

            header("Location: /index.php");
            die();
        }

    }



}

