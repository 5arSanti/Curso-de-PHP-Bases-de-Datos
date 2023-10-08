<?php

    namespace App\Controllers;

    use Database\PDO\Connection;

    class IncomesController {
        private $connection;
        public function __construct() {
            $this->connection = Connection::getInstance()->get_database_instance();
        }

        /**
         * Muestra una lista de este recurso
         */
        public function index() {
            $stmt = $this->connection->prepare("SELECT * FROM incomes");
            $stmt->execute();

            $results = $stmt->fetchAll();
            require("../resources/views/incomes/index.php");

        }

        /**
         * Muestra un formulario para crear un nuevo recurso
         */
        public function create() {
            require("../resources/views/incomes/create.php");
        }

        /**
         * Guarda un nuevo recurso en la base de datos
         */
        public function store($data) {
            $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES(:payment_method, :type, :date, :amount, :description);");

            $stmt->bindValue(":payment_method", $data["payment_method"]);
            $stmt->bindValue(":type", $data["type"]);
            $stmt->bindValue(":date", $data["date"]);
            $stmt->bindValue(":amount", $data["amount"]);
            $stmt->bindValue(":description", $data["description"]);

            $stmt->execute();
            header("location: incomes");
        }

        /**
         * Muestra un unico recurso especificado
         */
        public function show($id) {
            $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id");
            $stmt->execute([
                ":id" => $id
            ]);
        }

        /**
         * Muestra el formulario para editar un recurso
         */
        public function edit() {

        }

        /**
         * Actualiza un recurso especifico en la base de datos
         */
        public function update($id, $data) {
            $stmt = $this->connection->prepare("UPDATE incomes SET 
                payment_method=:payment_method,
                type=:type,
                date=:date,
                amount=:amount,
                description=:description
                WHERE id=:id
            ");
            $stmt->execute([
                ":id" => $id,
                ":payment_method" => $data["payment_method"],
                ":type" => $data["type"],
                ":date" => $data["date"],
                ":amount" => $data["amount"],
                ":description" => $data["description"]
            ]);
        }

        /**
         * Elimina un recurso especifico
         */
        public function destroy($id) {
            // $this->connection->beginTransaction();

            $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id=:id");
            $stmt->execute([
                ":id" => $id
            ]);

            // $sure = readline("Seguro quieres eliminar este registro?");

            // if ($sure == "no" || $sure == "n") {
            //     $this->connection->rollback();
            // } else {
            //     $this->connection->commit();
            // }
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