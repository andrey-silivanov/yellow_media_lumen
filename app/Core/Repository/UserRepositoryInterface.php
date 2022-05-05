<?php
declare(strict_types=1);

namespace App\Core\Repository;

interface UserRepositoryInterface
{
    /**
     * @param array $attributes
     * @return array
     */
    public function create(array $attributes): array;
}
