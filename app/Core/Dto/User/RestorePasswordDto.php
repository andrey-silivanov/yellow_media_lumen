<?php
declare(strict_types=1);

namespace App\Core\Dto\User;

use App\Core\Dto\AbstractDto;
use App\Core\Dto\Contracts\DtoInterface;
use JetBrains\PhpStorm\ArrayShape;

class RestorePasswordDto extends AbstractDto implements DtoInterface
{
    /** @var string */
    protected string $email;

    /** @var string */
    protected string $password;

    /** @var string */
    protected string $token;

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
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['email'    => "string",
                  'password' => "string",
                  'token'    => "string"
    ])] protected function configureValidatorRules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'token'    => 'required'
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
        $this->token = $data['token'];

        return true;
    }
}
