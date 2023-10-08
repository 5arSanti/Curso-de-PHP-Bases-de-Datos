<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="/css/styles.css">
        <title>Lista de Ingresos</title>
    </head>
    <body>
        <div class="incomes-container">
            <div class="incomes-list-container">
                <h1>Lista de ingresos</h1>

                <ul>
                    <?php foreach($results as $result): ?>
                        <div class="incomes-card-container">
                            <div class="incomes-card-info">
                                <p><?= $result["description"] ?></p>
                                <p><?= $result["date"] ?></p>
                            </div>
                            <div class="incomes-card-amount">
                                <p><?= $result["amount"] ?> $</p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </ul>
            </div>
            <a href="/incomes/create">Agregar nuevo Ingreso</a>
        </div>
    </body>
</html>