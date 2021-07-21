<?php

namespace App\Models;

use \PDO;

class DataBase {

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
            $dsn = $connectionParams['DB_CONNECTION'] . ':host=' . $connectionParams['DB_HOST'] . ';port=' . $connectionParams['DB_PORT'] . ';dbname=' . $connectionParams['DB_NAME'] . ';charset=' . $connectionParams['DB_CHAR'];
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
    private static function sql($sql, $args = [], $insertRows = false) {
        $stmt = self::instance()->prepare($sql);
        if(!$insertRows) {
            $stmt->execute($args);
            return $stmt;
        } else {
            return $stmt;
        }

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
     * @param array $arRows
     * @return integer affected rows
     */
    public static function insertRows($sql, $arRows) {
        $stmt = self::sql($sql, [], true);

        foreach ($arRows as $row) {
            $stmt->execute($row);
        }
        return count($arRows);
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
