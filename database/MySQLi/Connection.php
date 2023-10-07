<?php

    namespace Database\MySQLi;

    class Connection {
        private static $instance;
        private $connection;

        private function __construct() {
            $this->make_connection();
        }

        //Singleton => Permite unicamente tener una sola intancia en la clase
        // Se instancia y luego llama al constructor que ejecuta el resto de la logica
        public static function getInstance() {
            if (!self::$instance instanceof self) {
                self::$instance = new self();
            }
            return self::$instance;
            //Completamente equivalente
            // if (!Connection::$instance instanceof Connection) {
            //     Connection::$instance = new Connection();
            // }
        }

        private function make_connection() {
            $server = "localhost:3306";
            $username = "root";
            $password = "";
            $database = "finanzas_personales";

            $mysqli = new \mysqli($server, $username, $password, $database);

            //Comprobar conexion - Objetos
            if ($mysqli->connect_errno) {
                die("Fallo la conexion " . $mysqli->connect_error);
            }

            //Esto nos ayuda a poder usar cualquier caracter en nuestras consultas
            $setnames = $mysqli->prepare("SET NAMES 'utf8'");
            $setnames->execute();

            $this->connection = $mysqli;
        }

        public function get_database_instance() {
            return $this->connection;
        }
    }



    //Forma procedural
    // $mysqli = mysqli_connect($server, $username, $password, $database);

    //Comprobar conexion - Procedural
    // if (!$mysqli) {
    //     die("Fallo la conexion: ".  mysqli_connect_error());
    // }


