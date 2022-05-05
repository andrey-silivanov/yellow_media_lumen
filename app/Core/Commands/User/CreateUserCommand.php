<?php
declare(strict_types=1);

namespace App\Core\Commands\User;

use App\Core\Commands\Contracts\CommandInterface;
use App\Core\Dto\Contracts\DtoInterface;
use App\Core\Dto\User\CreateUserDto;
use App\Core\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class CreateUserCommand implements CommandInterface
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
     * @param CreateUserDto $dto
     * @return bool
     */
    public function execute(DtoInterface $dto): bool
    {
        $this->repository->create([
            'first_name' => $dto->getFirstName(),
            'last_name' => $dto->getLastName(),
            'phone' => $dto->getPhone(),
            'email' => $dto->getEmail(),
            'password' =>  $this->getHashedPassword($dto->getPassword()),
        ]);

        return true;
    }

    /**
     * @param string $password
     * @return string
     */
    protected function getHashedPassword(string $password): string
    {
        return $this->hasher->make($password);
    }
}
