<?php
declare(strict_types=1);

namespace App\Repository;

use App\Core\Repository\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     * @param Company $model
     */
    public function __construct(protected Company $model)
    {
    }

    /**
     * @param int $userId
     * @return array
     */
    public function findCompanyByUserId(int $userId): array
    {
        return $this->model->select('title', 'phone', 'description')->whereHas('users',
            function (Builder $query) use ($userId) {
                $query->where('user_id', '=', $userId);
            })->get()->toArray();
    }

    /**
     * @param string $phone
     * @return array|null
     */
    public function findByPhone(string $phone): ?array
    {
        $result = $this->model->select('id')->where('phone', $phone)->first();

        return $result?->toArray();
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function create(array $attributes): array
    {
        return $this->model->create($attributes)->toArray();
    }

    /**
     * @param int $companyId
     * @param int $userId
     * @return void
     */
    public function attachUser(int $companyId, int $userId): void
    {
        $company = $this->model->find($companyId);
        $company->users()->syncWithoutDetaching($userId);
    }
}
