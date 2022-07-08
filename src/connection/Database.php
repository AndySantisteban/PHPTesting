<?php declare (strict_types = 1);
namespace App\Connection;

class Database
{
    private $_connection;
    private static $_instance;
    private $_host = "127.0.0.1";
    private $_username = "root";
    private $_password = "";
    private $_database = "gestionDatos";

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->_connection = new \mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);

        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }

    private function __clone()
    {}

    public function getConnection()
    {
        return $this->_connection;
    }

    public function executeFileSql()
    {
        $file = fopen("db/init.sql", "r");
        $sql = "";
        while (!feof($file)) {
            $line = fgets($file);
            if (!feof($file) && $line[0] != "#") {
                $sql .= $line;
            }
        }
        fclose($file);
        return $this->_connection->multi_query($sql);

    }
}