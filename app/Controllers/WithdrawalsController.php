<?php

    namespace App\Controllers;

    use Database\PDO\Connection;

    class WithdrawalsController {

        /**
         * Muestra una lista de este recurso
         */
        public function index() {

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
            $connection = Connection::getInstance()->get_database_instance();

            $affected_rows = $connection->exec("INSERT INTO withdrawals (payment_method, type, date, amount, description) VALUES (
                {$data["payment_method"]},
                {$data["type"]},
                '{$data["date"]}',
                {$data["amount"]},
                '{$data["description"]}'
            )");
            echo "Se han insertado $affected_rows filas en la base de datos";
        }

        /**
         * Muestra un unico recurso especificado
         */
        public function show() {

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