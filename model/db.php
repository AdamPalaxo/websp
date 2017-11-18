<?php

class DB
{
    protected $dbhost;
    protected $dbname;
    protected $user;
    protected $pass;

    protected $conn;

    protected function __construct($dbhost, $dbname, $user, $pass)
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }

    protected function connect()
    {
        $this->conn = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8', $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");

        echo "Připojení úspěšné! <br>";
    }

    public function getOneRow($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetch();
    }

    public function getAllRows($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetchAll();
    }

    public function getColumn($query, $parameters = array())
    {
        $result = self::getOneRow($query, $parameters);

        return $result[0];
    }

    public function get($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->rowCount();
    }

}

