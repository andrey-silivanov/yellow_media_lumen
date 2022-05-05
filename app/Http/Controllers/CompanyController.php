<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Commands\Company\UserCompanyCommand;
use App\Core\Dto\User\AuthUserDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * @return JsonResponse
     * @throws ValidationException
     */
    public function index(): JsonResponse
    {
        $dto = $this->makeCreateUserDto(Auth::id());

        $result = $this->commandHandler->handle(UserCompanyCommand::class, $dto);

        return $this->successJsonResponse($result);
    }

    /**
     * @param int $userId
     * @return AuthUserDto
     * @throws ValidationException
     */
    private function makeCreateUserDto(int $userId): AuthUserDto
    {
        return new AuthUserDto(
            [
                'id'      => $userId,
            ]
        );
    }
}
