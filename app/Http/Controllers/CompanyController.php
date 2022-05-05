<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Commands\Company\AddCompanyCommand;
use App\Core\Commands\Company\UserCompanyCommand;
use App\Core\Dto\Company\AddCompanyDto;
use App\Core\Dto\User\AuthUserDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
        $dto = $this->makeAuthUserDto(Auth::id());

        $result = $this->commandHandler->handle(UserCompanyCommand::class, $dto);

        return $this->successJsonResponse($result);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $dto = $this->makeAddCompanyDto(Auth::id(), $request);

        $this->commandHandler->handle(AddCompanyCommand::class, $dto);

        return $this->successJsonResponse(true);
    }

    /**
     * @param int $userId
     * @return AuthUserDto
     * @throws ValidationException
     */
    private function makeAuthUserDto(int $userId): AuthUserDto
    {
        return new AuthUserDto([
            'id' => $userId,
        ]);
    }

    /**
     * @param int $userId
     * @param Request $request
     * @return AddCompanyDto
     * @throws ValidationException
     */
    private function makeAddCompanyDto(int $userId, Request $request): AddCompanyDto
    {
        return new AddCompanyDto([
            'title'       => $request->get('title'),
            'user_id'     => $userId,
            'phone'       => $request->get('phone'),
            'description' => $request->get('description'),
        ]);
    }
}
