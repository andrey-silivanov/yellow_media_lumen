<?php
declare(strict_types=1);

namespace App\Core\Dto\User;

use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\AbstractDto;
use JetBrains\PhpStorm\ArrayShape;

class CreateUserDto extends AbstractDto implements DtoInterface
{
    /** @var string */
    protected string $firstName;

    /** @var string */
    protected string $lastName;

    /* @var string */
    protected string $email;

    /** @var string */
    protected string $phone;

    /** @var string */
    protected string $password;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

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
    public function getPhone(): string
    {
        return $this->phone;
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
    #[ArrayShape([
        'first_name' => "string",
        'last_name'  => "string",
        'email'      => "string",
        'phone'      => "string",
        'password'   => "string"
    ])] protected function configureValidatorRules(): array
    {
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'phone'      => 'required|digits:11|unique:users',
            'password'   => 'required|min:6',
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->password = $data['password'];

        return true;
    }
}
