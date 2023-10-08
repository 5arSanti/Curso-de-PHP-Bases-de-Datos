<?php

    namespace App\Controllers;

    use Database\PDO\Connection;

    class WithdrawalsController {
        private $connection;
        public function __construct(){
            $this->connection = Connection::getInstance()->get_database_instance();
        }

        /**
         * Muestra una lista de este recurso
         */
        public function index() {
            //------------------------------------------------------------------------------------
            $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
            $stmt->execute();

            $results = $stmt->fetchAll();
            foreach($results as $result) {
                echo "Gastaste " . $result['amount'] . "$ en ". $result['description'] . "\n";
            }

            //------------------------------------------------------------------------------------
            // Esto es usando Fetch Column
            // $stmt = $this->connection->prepare("SELECT amount, description FROM withdrawals");
            // $stmt->execute();

            // $results = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
            // foreach($results as $result) {
            //     echo "Gastaste $result$ \n";
            // }
            //------------------------------------------------------------------------------------
        }

        /**
         * Muestra un formulario para crear un nuevo recurso
         */
        public function create() {

        }

        /**
         * Guarda un nuevo recurso en la base de datos
         */
        public function store($data) {
            $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) VALUES (:payment_method, :type, :date, :amount, :description)");

            $stmt->bindValue(":payment_method", $data["payment_method"]);
            $stmt->bindValue(":type", $data["type"]);
            $stmt->bindValue(":date", $data["date"]);
            $stmt->bindValue(":amount", $data["amount"]);
            $stmt->bindValue(":description", $data["description"]);

            $stmt->execute();
        }

        /**
         * Muestra un unico recurso especificado
         */
        public function show($id) {
            $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id=:id");
            $stmt->execute([
                ":id" => $id
            ]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            // var_dump($result);
            echo "El registro con id $id dice que te gastaste {$result['amount']}$ en {$result['description']}";
        }

        /**
         * Muestra el formulario para editar un recurso
         */
        public function edit() {

        }

        /**
         * Actualiza un recurso especifico en la base de datos
         */
        public function update() {

        }

        /**
         * Elimina un recurso especifico
         */
        public function destroy() {

        }
        
    }

    /*
    index: muestra la lista de todos los recursos.
    create: muestra un formulario para ingresar un nuevo recurso. (luego manda a llamar al método store).
    store: registra dentro de la base de datos el nuevo recurso.
    show: muestra un recurso específico.
    edit: muestra un formulario para editar un recurso. (luego manda a llamar al método update).
    update: actualiza el recurso dentro de la base de datos.
    destroy: elimina un recurso.
    */