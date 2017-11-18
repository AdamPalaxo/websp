<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 6.11.2017
 * Time: 23:58
 */

require "../controller/BaseController.php";

class LoginController extends BaseController
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


    function process($parameters)
    {
        // TODO: Implement process() method.
    }
}

