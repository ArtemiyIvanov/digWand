<?php

    class DataBase {

        const DB_HOST = 'localhost';
        const DB_PORT = '';
        const DB_NAME = 'e-shop';
        const DB_USER = 'root';
        const DB_PASS = '';
        const DB_CHAR = 'utf8';

        // protected static $DB_HOST = '';
        // protected static $DB_PORT = '';
        // protected static $DB_NAME = '';
        // protected static $DB_USER = '';
        // protected static $DB_PASS = '';
        // protected static $DB_CHAR = '';
    
        protected static $instance = null;
    
        private function __construct($config) {
            // self::$DB_HOST = $config['DB_HOST'];
            // self::$DB_PORT = $config['DB_PORT'];
            // self::$DB_NAME = $config['DB_NAME'];
            // self::$DB_USER = $config['DB_USER'];
            // self::$DB_PASS = $config['DB_PASS'];
            // self::$DB_CHAR = $config['DB_CHAR'];
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
                // $dsn = 'mysql:host=' . self::$DB_HOST . ';port=' . self::$DB_PORT . ';dbname=' . self::$DB_NAME . ';charset=' . self::$DB_CHAR;
                // self::$instance = new PDO($dsn, self::$DB_USER, self::$DB_PASS, $opt);
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
