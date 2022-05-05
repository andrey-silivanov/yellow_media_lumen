<?php
declare(strict_types=1);

namespace App\Core\Dto;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

abstract class AbstractDto
{
    /**
     * AbstractRequestDto constructor.
     * @param array $data
     * @throws ValidationException
     */
    public function __construct(array $data)
    {
        $validator = Validator::make(
            $data,
            $this->configureValidatorRules()
        );

        $validator->validate();

        if (!$this->map($data)) {
            throw new InvalidArgumentException('The mapping failed');
        }
    }

    /* @return array */
    abstract protected function configureValidatorRules(): array;

    /**
     * @param array $data
     * @return bool
     */
    abstract protected function map(array $data): bool;
}
