<?php

abstract class BaseController
{
    protected $data = array();
    protected $view = "";
    protected $heading = array('title' => '', 'keywords' => '', 'description' => '');

    /**
     * Main method of controller that
     * all other controllers extends.
     *
     * @param $parameters
     * @return mixed
     */
    abstract function process($parameters);

    /**
     * Renders desired view.
     *
     */
    public function renderView()
    {
        if ($this->view)
        {
            extract($this->validate($this->data));
            extract($this->data, EXTR_PREFIX_ALL, "");
            if (file_exists("view/" . $this->view . ".html"))
            {
                require("view/" . $this->view . ".html");
            }
        }
    }

    /**
     * Redirects to given url.
     *
     * @param string $url address to redirect
     */
    public function redirect($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    /**
     * Adds new message for user.
     *
     * @param string $message message of user
     * @param string $style style of the message
     */
    public function addMessage($message, $style)
    {
        if(isset($_SESSION['messages']))
        {
            $_SESSION['messages'][] = array('message' => $message, 'style' => $style);
        }
        else
        {
            $_SESSION['messages'] = array(array('message' => $message,'style' => $style)); array($message);
        }
    }

    /**
     * Returns messages for user.
     *
     * @return array array of messages
     */
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

    /**
     * Validates variables for rendering in HTML site
     * to prevent cross-site scripting (XSS).
     *
     * @param null $x given html
     * @return array|null|string validated html
     */
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

    /**
     * Checks if user exist or has got
     * admin access.
     *
     * @param bool $admin set if user must be admin
     */
    public function checkUser($admin = false)
    {
        $userManager = new UserManager();
        $user = $userManager->returnUser();

        if (!$user || ($admin && $user['role'] != 'admin'))
        {
            $this->addMessage('Nedostatečná oprávnění.', "warning");
            $this->redirect('index.php?page=intro');
        }
    }

}