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
}
