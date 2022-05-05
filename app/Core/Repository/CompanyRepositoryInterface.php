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

    /**
     * @param string $phone
     * @return array|null
     */
    public function findByPhone(string $phone): ?array;

    /**
     * @param array $attributes
     * @return array
     */
    public function create(array $attributes): array;

    /**
     * @param int $companyId
     * @param int $userId
     * @return void
     */
    public function attachUser(int $companyId, int $userId): void;
}
