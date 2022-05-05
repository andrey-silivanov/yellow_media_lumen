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

    /**
     * @param string $email
     * @return array|null
     */
    public function findByEmailWithPassword(string $email): ?array
    {
        $result = $this->model->where('email', $email)->first();

        if (null !== $result) {
            $password = $result->getAuthPassword();
            $result = $result->toArray();
            $result['password'] = $password;
        }

        return $result;
    }

    /**
     * @param string $email
     * @return array|null
     */
    public function findByEmail(string $email): ?array
    {
        $result = $this->model->where('email', $email)->first();

        return $result?->toArray();
    }

    /**
     * @param int $id
     * @param string $apiToken
     * @return void
     */
    public function updateApiTokenById(int $id, string $apiToken): void
    {
        $this->model->where('id', $id)->update(['api_token' => $apiToken]);
    }
}
