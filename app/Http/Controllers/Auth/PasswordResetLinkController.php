<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Core\Commands\User\ResetPasswordCommand;
use App\Core\Dto\User\ResetPasswordDto;
use App\Core\Exceptions\RecoverPasswordException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PasswordResetLinkController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $dto = $this->makeResetPasswordDto($request);

        try {
            $this->commandHandler->handle(ResetPasswordCommand::class, $dto);
        } catch (RecoverPasswordException $e) {
            return $this->errorJsonResponse($e->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->successJsonResponse(true);
    }

    /**
     * @param Request $request
     * @return ResetPasswordDto
     * @throws ValidationException
     */
    private function makeResetPasswordDto(Request $request): ResetPasswordDto
    {
        return new ResetPasswordDto([
            'email' => $request->get('email')
        ]);
    }
}
