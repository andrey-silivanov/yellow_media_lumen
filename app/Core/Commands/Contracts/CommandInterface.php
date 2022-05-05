<?php
declare(strict_types=1);

namespace App\Core\Commands\Contracts;

use App\Core\Dto\Contracts\DtoInterface;

interface CommandInterface
{
    /**
     * @param DtoInterface $dto
     * @return mixed
     */
    public function execute(DtoInterface $dto): mixed;
}
