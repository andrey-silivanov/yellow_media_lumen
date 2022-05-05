<?php
declare(strict_types=1);

namespace App\Core\Handlers;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Handlers\Contracts\CommandHandlerInterface;
use InvalidArgumentException;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CommandHandler implements CommandHandlerInterface
{
    /**
     * @param ContainerContract $container
     */
    public function __construct(protected ContainerContract $container)
    {
    }

    /**
     * @param string $commandName
     * @param DtoInterface $dto
     * @return mixed
     */
    public function handle(string $commandName, DtoInterface $dto): mixed
    {
        /* @var CommandInterface $command */
        try {
            $command = $this->container->get($commandName);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            throw new InvalidArgumentException($e->getMessage());
        }

        return $command->execute($dto);
    }
}
