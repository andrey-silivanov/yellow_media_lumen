<?php
declare(strict_types=1);

namespace App\Core\Services\RecoverPassword\Contracts;

use App\Core\Dto\User\ResetPasswordDto;
use App\Core\Dto\User\RestorePasswordDto;

interface RecoverPasswordServiceInterface
{
    /**
     * @param ResetPasswordDto $dto
     * @return void
     */
    public function resetPassword(ResetPasswordDto $dto): void;

    /**
     * @param RestorePasswordDto $dto
     * @return void
     */
    public function restorePassword(RestorePasswordDto $dto): void;
}
