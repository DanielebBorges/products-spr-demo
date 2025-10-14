<?php

declare(strict_types=1);

namespace App\Contracts;

final class ProductValidator
{
    /**
     * @param array{name?:string,price?:float} $input
     */
    public function validate(array $input): array
    {
        $errors = [];

        $name = $input['name'] ?? '';
        $price = $input['price'] ?? '';

        if (!$this->validateName($name)) {
            $errors[] = 'Nome inválido';
        }

        if (!$this->validatePrice($price)) {
            $errors[] = 'Preço inválido';
        }

        return $errors;
    }

    public function isValid(array $input): bool
    {
        return empty($this->validate($input));
    }

    private function validateName(string $name): bool
    {
        return strlen($name) >= 2 && strlen($name) <= 100;
    }

    private function validatePrice($price): bool
    {
        return is_numeric($price) && (float)$price >= 0;
    }
}
