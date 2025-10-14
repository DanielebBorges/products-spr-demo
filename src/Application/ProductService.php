<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

final class ProductService
{
    public function __construct(
        private ProductRepository $repository,
        private ProductValidator $validator
    ) {
    }

    public function create(array $data): bool
    {
        if (!$this->validator->isValid($data)) {
            return false;
        }

        return $this->repository->save($data);
    }

    public function list(): array
    {
        return $this->repository->all();
    }
}
