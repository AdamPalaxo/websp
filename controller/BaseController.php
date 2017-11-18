<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 16.11.2017
 * Time: 9:59
 */

abstract class BaseController
{
    protected $data = array();
    protected $view = "";
    protected $heading = array('title' => '', 'key_words' => '', 'description' => '');

    abstract function process($parameters);

    public function showView()
    {

    }

    public function redirect($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }
}