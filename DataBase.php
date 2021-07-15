<?php

    class DataBase {

        const DB_HOST = 'localhost';
        const DB_PORT = '3307';
        const DB_NAME = 'e-shop';
        const DB_USER = 'root';
        const DB_PASS = '';
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
            if (self::$instance === null) {
                $opt = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => TRUE,
                );
                $dsn = 'mysql:host=' . self::DB_HOST . ';port=' . self::DB_PORT . ';dbname=' . self::DB_NAME . ';charset=' . self::DB_CHAR;
                self::$instance = new PDO($dsn, self::DB_USER, self::DB_PASS, $opt);
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
