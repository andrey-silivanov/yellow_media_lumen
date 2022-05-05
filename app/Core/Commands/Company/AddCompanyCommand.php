<?php
declare(strict_types=1);

namespace App\Core\Commands\Company;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Company\AddCompanyDto;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Repository\CompanyRepositoryInterface;
use InvalidArgumentException;

class AddCompanyCommand implements CommandInterface
{
    /**
     * @param CompanyRepositoryInterface $repository
     */
    public function __construct(protected CompanyRepositoryInterface $repository)
    {
    }

    /**
     * @param DtoInterface $dto
     * @return bool
     */
    public function execute(DtoInterface $dto): bool
    {
        // We check if this is a AddCompanyDto
        if (!$dto instanceof AddCompanyDto) {
            throw new InvalidArgumentException('CreateUserService needs to receive a CreateUserDto.');
        }

        $company = $this->repository->findByPhone($dto->getPhone());
        if (null === $company) {
            $company = $this->createCompany($dto);
        }

        $this->attachCompanyToUser($company['id'], $dto->getUserId());

        return true;
    }

    /**
     * @param AddCompanyDto $dto
     * @return array
     */
    private function createCompany(AddCompanyDto $dto): array
    {
        return $this->repository->create([
            'title'       => $dto->getTitle(),
            'phone'       => $dto->getPhone(),
            'description' => $dto->getDescription(),
        ]);
    }

    /**
     * @param int $companyId
     * @param int $userId
     * @return void
     */
    private function attachCompanyToUser(int $companyId, int $userId): void
    {
        $this->repository->attachUser($companyId, $userId);
    }
}
