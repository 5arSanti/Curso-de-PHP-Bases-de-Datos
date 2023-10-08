<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/css/styles.css">
        <title>Agrega un nuevo ingreso</title>
    </head>

    <body>
        <div class="create-container">

            <div class="create-list-container">
                <h1>Agregar Ingreso</h1>
                <form action="/incomes" method="post">
                    <div class="payment-and-type-container">
                        <div>
                            <label for="payment_method">Metodo de pago</label>
                            <select name="payment_method" id="payment_method">
                                <option value="1" selected>Cuenta Bancaria</option>
                                <option value="2">Tarjeta de crédito</option>
                            </select>   
                        </div>

                        <div>
                            <label for="type">Tipo de ingreso</label>
                            <select name="type" id="type">
                                <option value="1" selected>Pago de Nómina</option>
                                <option value="2">Reembolso</option>
                            </select>
                        </div>

                    </div>

                    <label for="date">Fecha</label>
                    <input type="date" name="date">

                    <label for="amount">Cantidad</label>
                    <input type="amount" name="amount" placeholder="Cantidad">

                    <label for="description">Descripcion</label>
                    <textarea type="description" name="description" placeholder="Descripcion"></textarea>

                    <input type="hidden" name="method" value="post" >

                    <button type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </body>
</html>