<?php

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

final class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param array{name:string,price:float} $product
     */
    public function save(array $product): bool
    {
        $product['id'] = $this->getNextId();

        $linha = json_encode($product) . PHP_EOL;
        $resultado = file_put_contents($this->filePath, $linha, FILE_APPEND);

        return $resultado !== false;
    }

    public function all(): array
    {
        $produtos = [];
        $linhas = file($this->filePath);

        foreach ($linhas as $linha) {
            $produto = json_decode($linha, true);
            if (is_array($produto)) {
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }

    private function getNextId(): int
    {
        $linhas = file($this->filePath);

        if (count($linhas) === 0) {
            return 1;
        }

        $ultimaLinha = $linhas[count($linhas) - 1];
        $ultimoProduto = json_decode($ultimaLinha, true);

        return $ultimoProduto['id'] + 1;
    }
}
