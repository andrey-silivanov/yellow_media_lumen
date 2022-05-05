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

    /**
     * @param string $email
     * @return null|array
     */
    public function findByEmail(string $email): ?array;

    /**
     * @param int $id
     * @param string $apiToken
     * @return void
     */
    public function updateApiTokenById(int $id, string $apiToken): void;
}
