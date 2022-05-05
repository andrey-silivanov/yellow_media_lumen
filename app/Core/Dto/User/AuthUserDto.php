<?php
declare(strict_types=1);

namespace App\Core\Dto\User;

use App\Core\Dto\AbstractDto;
use App\Core\Dto\Contracts\DtoInterface;
use JetBrains\PhpStorm\ArrayShape;

class AuthUserDto extends AbstractDto implements DtoInterface
{
    /** @var int */
    protected int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['id' => "string"])]
    protected function configureValidatorRules(): array
    {
        return [
            'id' => 'required|integer'
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->id = $data['id'];

        return true;
    }
}
