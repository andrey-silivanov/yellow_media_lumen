<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Core\Commands\User\CreateUserCommand;
use App\Core\Handlers\Contracts\CommandHandlerInterface;
use App\Http\Controllers\Controller;
use App\Core\Dto\User\CreateUserDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * @param CommandHandlerInterface $commandHandler
     */
    public function __construct(private CommandHandlerInterface $commandHandler)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $createUserDto = $this->makeCreateUserDto($request);

        $this->commandHandler->handle(CreateUserCommand::class, $createUserDto);

        return $this->successJsonResponse(true);
    }

    /**
     * @throws ValidationException
     */
    private function makeCreateUserDto(Request $request): CreateUserDto
    {
        return new CreateUserDto(
            [
                'first_name' => $request->get('first_name'),
                'last_name'  => $request->get('last_name'),
                'email'      => $request->get('email'),
                'phone'      => $request->get('phone'),
                'password'   => $request->get('password'),
            ]
        );
    }
}
