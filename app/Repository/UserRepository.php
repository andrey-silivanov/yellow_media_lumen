<?php
declare(strict_types=1);

namespace App\Repository;

use App\Core\Repository\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     * @param User $model
     */
    public function __construct(protected User $model)
    {
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    public function create(array $attributes): array
    {
        return $this->model->create($attributes)->toArray();
    }
}
