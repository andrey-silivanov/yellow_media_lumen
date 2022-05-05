<?php
declare(strict_types=1);

namespace App\Services\RecoverPassword;

use App\Core\Dto\User\ResetPasswordDto;
use App\Core\Dto\User\RestorePasswordDto;
use App\Core\Services\RecoverPassword\Contracts\RecoverPasswordServiceInterface;
use App\Exceptions\InvalidToken;
use App\Exceptions\ThrottledResetPassword;
use Illuminate\Contracts\Auth\PasswordBroker as PasswordBrokerAlias;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class RecoverPasswordService implements RecoverPasswordServiceInterface
{
    /**
     * @param ResetPasswordDto $dto
     * @return void
     * @throws InvalidToken
     * @throws ThrottledResetPassword
     */
    public function resetPassword(ResetPasswordDto $dto): void
    {
        $status = Password::sendResetLink(
            ['email' => $dto->getEmail()]
        );

        $this->checkError($status);
    }

    /**
     * @param RestorePasswordDto $dto
     * @return void
     * @throws InvalidToken
     * @throws ThrottledResetPassword
     */
    public function restorePassword(RestorePasswordDto $dto): void
    {
        $status = Password::reset(
            [
                'email' => $dto->getEmail(),
                'token' => $dto->getToken(),
                'password' => $dto->getPassword()
            ],
            function ($user) use ($dto) {
                $user->forceFill([
                    'password'       => Hash::make($dto->getPassword()),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        $this->checkError($status);
    }

    /**
     * @param string $status
     * @return void
     * @throws InvalidToken
     * @throws ThrottledResetPassword
     */
    private function checkError(string $status): void
    {
        if (PasswordBrokerAlias::INVALID_TOKEN === $status) {
            throw new InvalidToken($status);
        } elseif (PasswordBrokerAlias::RESET_THROTTLED === $status) {
            throw new ThrottledResetPassword($status);
        }
    }
}
