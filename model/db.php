<?php

class Db
{
    /** @var PDO */
    private static $conn; // Database object

    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    );

    public static function connect($host, $dbname, $user, $password)
    {
        if(!isset(self::$conn))
        {
            self::$conn = @new PDO(
                "mysql:host=$host;dbname=$dbname",
                $user,
                $password,
                self::$settings
            );
        }
    }

    public static function queryOne($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetch(PDO::FETCH_ASSOC);
    }

    public static function queryAll($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function queryColumn($query, $parameters = array())
    {
        $result = self::queryOne($query, $parameters);

        return $result[0];
    }

    public static function query($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->rowCount();
    }

    public static function insert($table, $parameters = array())
    {
        return self::query("INSERT INTO `$table` (`".
            implode('`, `', array_keys($parameters)).
            "`) VALUES (" . str_repeat('?,', count($parameters) - 1)."?)",
            array_values($parameters));
    }
}

