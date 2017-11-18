<?php
/**
 * Created by PhpStorm.
 * User: Ivona
 * Date: 13.11.2017
 * Time: 23:32
 */

class User extends DB_WEB
{
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct($this->dbhost, $this->dbname, $this->user, $this->pass);
        parent::connect();
    }

}