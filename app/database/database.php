<?php

class DatabaseMutation {
     static $host = "localhost";
     static $username = "root";
     static $password = "";
     static $databaseName = "dbcrud";
     static $helper;
     static $statement;
}

class Database extends DatabaseMutation {
    public function connect() {
        try {

            $connectionString = "mysql:host=" . DatabaseMutation::$host . ";dbname=" . DatabaseMutation::$databaseName;
            DatabaseMutation::$helper = new PDO($connectionString, DatabaseMutation::$username, DatabaseMutation::$password);
            DatabaseMutation::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return DatabaseMutation::$helper;

        } catch (PDOException $error) {
            die('Could not connect to the database' . $error->getMessage());
        }
    }

    public function php_prepare($sql){
        return DatabaseMutation::$statement = $this->connect()->prepare($sql);
    }

    public function php_variables($value, $params, $type = null){
        if(is_null($type)){
            switch($type){
                case 1:
                    $type = PDO::PARAM_INT;
                    break;
                case 2:
                    $type = PDO::PARAM_BOOL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        return DatabaseMutation::$statement->bindParam($value, $params, $type);
    }

    public function execution(){
        return DatabaseMutation::$statement->execute();
    }
}