<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Core\Commands\User\RestorePasswordCommand;
use App\Core\Dto\User\RestorePasswordDto;
use App\Core\Exceptions\RecoverPasswordException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NewPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $dto = $this->makeRestorePasswordDto($request);

        try {
            $this->commandHandler->handle(RestorePasswordCommand::class, $dto);
        } catch (RecoverPasswordException $e) {
            return $this->errorJsonResponse($e->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->successJsonResponse(true);
    }

    /**
     * @param Request $request
     * @return RestorePasswordDto
     * @throws ValidationException
     */
    private function makeRestorePasswordDto(Request $request): RestorePasswordDto
    {
        return new RestorePasswordDto([
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
            'token'    => $request->get('token')
        ]);
    }
}
