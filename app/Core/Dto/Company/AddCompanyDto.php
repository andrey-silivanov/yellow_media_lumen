<?php
declare(strict_types=1);

namespace App\Core\Dto\Company;

use App\Core\Dto\AbstractDto;
use App\Core\Dto\Contracts\DtoInterface;
use JetBrains\PhpStorm\ArrayShape;

class AddCompanyDto extends AbstractDto implements DtoInterface
{
    /** @var string */
    protected string $title;

    /** @var int */
    protected int $userId;

    /** @var string */
    protected string $phone;

    /** @var string */
    protected string $description;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string[]
     */
    #[ArrayShape([
        'title'       => "string",
        'user_id'     => "string",
        'phone'       => "string",
        'description' => "string"
    ])]
    protected function configureValidatorRules(): array
    {
        return [
            'title'       => 'required',
            'user_id'     => 'required|integer',
            'phone'       => 'required|digits:11',
            'description' => 'required',
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->title = $data['title'];
        $this->userId = $data['user_id'];
        $this->phone = $data['phone'];
        $this->description = $data['description'];

        return true;
    }
}
