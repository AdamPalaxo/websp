<?php

abstract class BaseController
{
    protected $data = array();
    protected $view = "";
    protected $heading = array('title' => '', 'keywords' => '', 'description' => '');

    // Main method of controller
    abstract function process($parameters);

    // Render view
    public function renderView()
    {
        if ($this->view)
        {
            extract($this->validate($this->data));
            extract($this->data, EXTR_PREFIX_ALL, "");
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

    // Adds new message for user
    public function addMessage($message)
    {
        if(isset($_SESSION['messages']))
        {
            $_SESSION['messages'][] = $message;
        }
        else
        {
            $_SESSION['messages'] = array($message);
        }
    }

    // Returns messages for user
    public function returnMessages()
    {
        if(isset($_SESSION['messages']))
        {
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
            return $messages;
        }
        else
        {
            return array();
        }
    }

    // Validates variables for rendering in HTML site
    private function validate($x = null)
    {
        if(!isset($x))
        {
            return null;
        }
        elseif(is_string($x))
        {
            return htmlspecialchars($x, ENT_QUOTES);
        }
        elseif(is_array($x))
        {
            foreach($x as $k => $v)
            {
                $x[$k] = $this->validate($v);
            }
            return $x;
        }
        else
        {
            return $x;
        }
    }

}