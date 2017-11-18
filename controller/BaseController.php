<?php

abstract class BaseController
{
    protected $data = array();
    protected $view = "";
    protected $heading = array('title' => '', 'key_words' => '', 'description' => '');

    // Main method of controller
    abstract function process($parameters);

    // Render view
    public function showView()
    {
        if ($this->view)
        {
            extract($this->data);
            require("view/" . $this->view . ".html");
        }
    }

    // Redirect to given URL
    public function redirect($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }
}