<?php
declare(strict_types=1);

namespace App\Core\Commands\User;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\User\ResetPasswordDto;
use App\Core\Services\RecoverPassword\Contracts\RecoverPasswordServiceInterface;
use InvalidArgumentException;

class ResetPasswordCommand implements CommandInterface
{
    /**
     * @param RecoverPasswordServiceInterface $recoverPasswordService
     */
    public function __construct(
        protected RecoverPasswordServiceInterface $recoverPasswordService
    ) {
    }

    /**
     * @param DtoInterface $dto
     * @return bool
     */
    public function execute(DtoInterface $dto): bool
    {
        // We check if this is a ResetPasswordDto
        if (!$dto instanceof ResetPasswordDto) {
            throw new InvalidArgumentException('ResetPasswordCommand needs to receive a ResetPasswordDto.');
        }

        $this->recoverPasswordService->resetPassword($dto);

        return true;
    }
}
