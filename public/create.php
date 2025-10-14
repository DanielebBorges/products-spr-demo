<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Contracts\ProductValidator;
use App\Infra\FileProductRepository;

$file = __DIR__ . '/../storage/products.txt';

$productService = new ProductService(
    new FileProductRepository($file),
    new ProductValidator()
);

$testProduct = [
    'name' => $_POST['name'] ?? null,
    'price' => $_POST['price'] ?? null,
];

$response = $productService->create($testProduct);
$httpCode = $response ? 201 : 422;

http_response_code($httpCode);
echo $response ? 'Produto cadastrado com sucesso' : 'Falha no cadastro do produto';
