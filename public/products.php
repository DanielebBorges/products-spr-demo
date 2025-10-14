<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Application\ProductService;
use App\Contracts\ProductValidator;

$filePath = __DIR__ . '/../storage/products.txt';

$productRepository = new FileProductRepository($filePath);
$productValidator = new ProductValidator();
$service = new ProductService($productRepository, $productValidator);

$products = $service->list();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
</head>
<body>
    <h1>Lista de produtos</h1>
    <?php
        if (empty($products)) {
            echo "Nenhum produto cadastrado.";
        } else {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Preço</th></tr>";

            foreach ($products as $produto) {
                echo "<tr>";
                echo "<td>" . $produto['id'] . "</td>";
                echo "<td>" . $produto['name'] . "</td>";
                echo "<td>R$ " . $produto['price'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    ?>
</body>
</html>
