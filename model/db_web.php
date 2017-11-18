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




}

