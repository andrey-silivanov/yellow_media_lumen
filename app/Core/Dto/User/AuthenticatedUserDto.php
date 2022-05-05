<?php
declare(strict_types=1);

namespace App\Core\Dto\User;

use App\Core\Dto\AbstractDto;
use App\Core\Dto\Contracts\DtoInterface;
use JetBrains\PhpStorm\ArrayShape;

class AuthenticatedUserDto extends AbstractDto implements DtoInterface
{
    /** @var string */
    protected string $email;

    /** @var string */
    protected string $password;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['email' => "string", 'password' => "string"])]
    protected function configureValidatorRules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->email = $data['email'];
        $this->password = $data['password'];

        return true;
    }
}
