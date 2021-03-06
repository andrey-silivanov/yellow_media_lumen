<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Core\Commands\User\AuthenticatedUserCommand;
use App\Core\Dto\User\AuthenticatedUserDto;
use App\Core\Exceptions\UnauthorizedException;
use App\Core\Exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthenticatedController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $dto = $this->makeCreateUserDto($request);

        try {
            $apiToken = $this->commandHandler->handle(AuthenticatedUserCommand::class, $dto);
        } catch (UserNotFoundException | UnauthorizedException) {
            return $this->errorJsonResponse("Unauthorized", ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $this->successJsonResponse(['token' => $apiToken]);
    }

    /**
     * @throws ValidationException
     */
    private function makeCreateUserDto(Request $request): AuthenticatedUserDto
    {
        return new AuthenticatedUserDto(
            [
                'email'      => $request->get('email'),
                'password'   => $request->get('password'),
            ]
        );
    }
}
