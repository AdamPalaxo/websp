<?php

require_once 'db.php';

class DB_WEB extends DB
{
    protected $dbhost = "localhost";
    protected $dbname = "kivweb";
    protected $user = "root";
    protected $pass = "";

    public function __construct()
    {
        parent::__construct($this->dbhost, $this->dbname, $this->user, $this->pass);
        parent::connect();
    }

    public function getlogin()
    {
        if (isset($_POST["username"]) && isset($_POST["password"]))
        {
            echo "Username and password is set!";
            if(parent::findUser($_POST['username'], $_POST['password']) == 1)
            {
                echo 'User was logged in!';
                return 1;
            }
            else
            {
                echo 'Invalid login!';
                return 0;
            }
        }
        else
        {
            echo "Not set!";
        }
    }

}




 ?>
