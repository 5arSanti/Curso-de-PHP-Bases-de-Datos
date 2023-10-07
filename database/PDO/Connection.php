<?php

    namespace Database\PDO;

    class Connection {
        private static $instance;
        private $connection;

        private function __construct(){
            $this->make_connection();
        }

        public static function getInstance() {
            if (!self::$instance instanceof self) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function make_connection() {
            $server = "localhost:3306";
            $username = "root";
            $password = "";
            $database = "finanzas_personales";
        
            $connection = new \PDO("mysql:host=$server;dbname=$database", $username, $password);
        
            $setnames = $connection->prepare("SET NAMES 'utf8'");
            $setnames->execute();

            $this->connection = $connection;
        }

        public function get_database_instance() {
            return $this->connection;
        }
    }