<?php

/**
 * Class Db is wrapper for easier manipulation with database
 * with use PDO with automatic security of parameters in queries.
 */
class Db
{
    /** @var PDO */
    private static $conn; // Database object

    /**
     * Setting of PDO object for connection.
     *
     * @var array array of setting of PDO object
     */
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    );

    /**
     * Connects to database.
     *
     * @param string $host ip address of database
     * @param string $dbname name of database
     * @param string $user admin's username
     * @param string $password admin' password
     */
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

    /**
     * Executes query for fetching one row.
     *
     * @param string $query desired query
     * @param array $parameters parameters for query
     * @return mixed result
     */
    public static function queryOne($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Executes query for fetching all.
     *
     * @param string $query desired query.
     * @param array $parameters parameters for query
     * @return mixed results
     */
    public static function queryAll($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Executes query for fetching one column.
     *
     * @param string $query desired query.
     * @param array $parameters parameters for query
     * @return mixed column
     */
    public static function queryColumn($query, $parameters = array())
    {
        $result = self::queryOne($query, $parameters);

        return $result[0];
    }

    /**
     * Executes query that returns row count.
     *
     * @param string $query desired query
     * @param array $parameters parameters for query
     * @return int number of rows
     */
    public static function query($query, $parameters = array())
    {
        $return_value = self::$conn->prepare($query);
        $return_value->execute($parameters);

        return $return_value->rowCount();
    }

    /**
     * Inserts new element into given table.
     *
     * @param string $table table where to insert element
     * @param array $parameters parameters of element
     * @return int result of insertion
     */
    public static function insert($table, $parameters = array())
    {
        return self::query("INSERT INTO `$table` (`".
            implode('`, `', array_keys($parameters)).
            "`) VALUES (" . str_repeat('?,', count($parameters) - 1)."?)",
            array_values($parameters));
    }

    /**
     * Updates existing element of given table with new values.
     *
     * @param string $table table with element
     * @param array $values new updated values
     * @param string $condition condition of update
     * @param array $parameters parameters of update
     * @return int result of update
     */
    public static function update($table, $values = array(), $condition, $parameters = array())
    {
        return self::query("UPDATE `$table` SET `".
            implode('` = ?, `', array_keys($values)).
            "` = ? " . $condition,
            array_merge(array_values($values), $parameters));
    }

    /**
     * Returns last inserted id.
     *
     * @return string last id
     */
    public static function getLastID()
    {
        return self::$conn->lastInsertId();
    }
}

