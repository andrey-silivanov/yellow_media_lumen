<?php
declare(strict_types=1);

namespace App\Core\Repository;

interface PasswordResetRepositoryInterface
{
    public function create(array $attributes);

    public function find(string $token);

    public function delete();
}
