<?php

class LoginController extends BaseController
{
    public $db_web;

    public function __construct()
    {
        $this->db_web= new DB_WEB();
    }

    function process($parameters)
    {
        // TODO: Implement process() method.
    }
}




