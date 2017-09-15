<?php

namespace MVC_model2\Engine;

abstract class Model {
    
    /**
     * Object of the class PDO
     * @var object
     */
    protected $pdo;
    
    /**
     * This function sets connection with the database
     * @return void
     */
    public function __construct() {
        try {
            $this->pdo = new PDO(DB_TYPE . ':host=' .DB_HOST . ';dbname=' . DB_NAME,
                    DB_USER, DB_PASS, array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (DBException $ex) {
            echo 'Connection error: ' . $ex->getMessage();
        }
    }
}