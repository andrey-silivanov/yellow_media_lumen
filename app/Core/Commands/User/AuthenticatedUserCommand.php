<?php
declare(strict_types=1);

namespace App\Core\Commands\User;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\User\AuthenticatedUserDto;
use App\Core\Exceptions\UnauthorizedException;
use App\Core\Exceptions\UserNotFoundException;
use App\Core\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use InvalidArgumentException;

class AuthenticatedUserCommand implements CommandInterface
{
    /**
     * CreateUserService constructor.
     * @param UserRepositoryInterface $repository
     * @param HasherContract $hasher
     */
    public function __construct(protected UserRepositoryInterface $repository, protected HasherContract $hasher)
    {
    }

    /**
     * @param DtoInterface $dto
     * @return string
     * @throws UnauthorizedException
     * @throws UserNotFoundException
     */
    public function execute(DtoInterface $dto): string
    {
        // We check if this is a AuthenticatedUserDto
        if (!$dto instanceof AuthenticatedUserDto) {
            throw new InvalidArgumentException('CreateUserService needs to receive a AuthenticatedUserDto.');
        }

        $user = $this->repository->findByEmail($dto->getEmail());
        if (null === $user) {
            throw new UserNotFoundException();
        }

        if(!$this->checkPassword($dto, $user['password'])) {
            throw new UnauthorizedException();
        }

        $apiToken = $this->createApiToken();

        $this->repository->updateApiTokenById($user['id'], $apiToken);

        return $apiToken;
    }

    /**
     * @param DtoInterface $dto
     * @param string $password
     * @return bool
     */
    private function checkPassword(DtoInterface $dto, string $password): bool
    {
        return $this->hasher->check($dto->getPassword(), $password);
    }

    /**
     * @throws Exception
     */
    private function createApiToken(): string
    {
        return bin2hex(random_bytes(64));
    }
}
