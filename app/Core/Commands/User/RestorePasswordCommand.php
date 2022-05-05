<?php
declare(strict_types=1);

namespace App\Core\Commands\User;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\User\RestorePasswordDto;
use App\Core\Services\RecoverPassword\Contracts\RecoverPasswordServiceInterface;
use InvalidArgumentException;

class RestorePasswordCommand implements CommandInterface
{
    /**
     * @param RecoverPasswordServiceInterface $recoverPasswordService
     */
    public function __construct(protected RecoverPasswordServiceInterface $recoverPasswordService)
    {
    }

    /**
     * @param DtoInterface $dto
     * @return bool
     */
    public function execute(DtoInterface $dto): bool
    {
        // We check if this is a RestorePasswordDto
        if (!$dto instanceof RestorePasswordDto) {
            throw new InvalidArgumentException('RestorePasswordCommand needs to receive a RestorePasswordDto.');
        }

        $this->recoverPasswordService->restorePassword($dto);

        return true;
    }
}
