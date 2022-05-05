<?php
declare(strict_types=1);

namespace App\Core\Dto\User;

use App\Core\Dto\AbstractDto;
use App\Core\Dto\Contracts\DtoInterface;
use JetBrains\PhpStorm\ArrayShape;

class ResetPasswordDto extends AbstractDto implements DtoInterface
{
    /**
     * @var string
     */
    protected string $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['email' => "string"])]
    protected function configureValidatorRules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->email = $data['email'];

        return true;
    }
}
