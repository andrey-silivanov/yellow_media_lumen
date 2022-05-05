<?php
declare(strict_types=1);

namespace App\Core\Repository;

interface CompanyRepositoryInterface
{
    /**
     * @param int $userId
     * @return array
     */
    public function findCompanyByUserId(int $userId): array;
}
