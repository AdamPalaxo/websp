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

        echo "Připojení úspěšné! <br>";
    }

    protected function executeQuery()
    {
        $stmt = $this->conn->query('SELECT * FROM user');

        while ($row = $stmt->fetch())
        {
            echo $row['username'] . "<br>";
        }

    }

    protected function findUser($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username=:username");

        $stmt->bindParam(":username", $username);

        $stmt->execute();

        if($stmt->rowCount($stmt) == 1)
        {
            $result = $stmt->fetchcolumn(2);

            if(password_verify($password, $result));
            {
                return 1;
            }
        }
        else
        {
            echo "Uživatel neexistuje\n";
            return 0;
        }

    }


}




?>
