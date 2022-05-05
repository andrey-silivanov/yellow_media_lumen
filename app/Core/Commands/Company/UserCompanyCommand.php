<?php
declare(strict_types=1);

namespace App\Core\Commands\Company;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\User\AuthUserDto;
use App\Core\Repository\CompanyRepositoryInterface;
use InvalidArgumentException;

class UserCompanyCommand implements CommandInterface
{
    /**
     * @param CompanyRepositoryInterface $repository
     */
    public function __construct(protected CompanyRepositoryInterface $repository)
    {
    }

    /**
     * @param DtoInterface $dto
     * @return array
     */
    public function execute(DtoInterface $dto): array
    {
        // We check if this is a AuthUserDto
        if (!$dto instanceof AuthUserDto) {
            throw new InvalidArgumentException('UserCompanyCommand needs to receive a AuthUserDto.');
        }

        return $this->repository->findCompanyByUserId($dto->getId());
    }
}
