<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products SRP</title>
</head>
<body>
    <h1>Cadastro de produtos</h1>
    <form action="create.php" method="POST">
        <input name="name" type="text" placeholder="Produto" ><br><br>
        <input type="number" name="price" step="0.01" placeholder="Valor" ><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>