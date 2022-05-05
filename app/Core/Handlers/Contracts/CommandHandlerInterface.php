<?php
declare(strict_types=1);

namespace App\Core\Handlers\Contracts;

use App\Core\Dto\Contracts\DtoInterface;

interface CommandHandlerInterface
{
    /**
     * @param string $commandName
     * @param DtoInterface $dto
     * @return mixed
     */
    public function handle(string $commandName, DtoInterface $dto): mixed;
}
