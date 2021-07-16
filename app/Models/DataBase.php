<?php

namespace App\Models;

use \PDO;

class DataBase {

    const DB_HOST = 'localhost';
    const DB_PORT = '';
    const DB_NAME = 'e-shop';
    const DB_USER = 'homestead';
    const DB_PASS = 'secret';
    const DB_CHAR = 'utf8';

    protected static $instance = null;

    private function __construct() {
    }

    private function __clone() {     
    }

    /**
     * 
     * @return PDO
     */
    private static function instance() {
        $connectionParams = getDbParams();

        if (self::$instance === null) {
            $dsn = 'mysql:host=' . $connectionParams['DB_HOST'] . ';port=' . $connectionParams['DB_PORT'] . ';dbname=' . $connectionParams['DB_NAME'] . ';charset=' . $connectionParams['DB_CHAR'];
            self::$instance = new PDO($dsn, $connectionParams['DB_USER'], $connectionParams['DB_PASS'], PDO_OPTIONS);
        }
        return self::$instance;
    }
                                                                                                                                                    
    /**
     * 
     * @param string $sql
     * @param array $args
     * @return PDOStatement
     */
    private static function sql($sql, $args = []) {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    /**
     * 
     * @param string $sql
     * @param array $args
     * @return array
     */
    public static function getRows($sql, $args = []) {
        return self::sql($sql, $args)->fetchAll();
    }

    /**
     * 
     * @param string $sql
     * @param array $args
     * @return array
     */
    public static function getRow($sql, $args = []) {
        return self::sql($sql, $args)->fetch();
    }

    /**
     * 
     * @param string $sql
     * @param array $args
     * @return integer ID
     */
    public static function insert($sql, $args = []) {
        self::sql($sql, $args);
        return self::instance()->lastInsertId();
    }

    /**
     * 
     * @param string $sql
     * @param array $args
     * @return integer affected rows
     */
    public static function update($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

    /** 
     * 
     * @param string $sql
     * @param array $args
     * @return integer affected rows
     */
    public static function delete($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }
    
}
