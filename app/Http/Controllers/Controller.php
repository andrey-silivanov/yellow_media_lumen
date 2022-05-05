<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Handlers\Contracts\CommandHandlerInterface;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
    /**
     * @param CommandHandlerInterface $commandHandler
     */
    public function __construct(protected CommandHandlerInterface $commandHandler)
    {
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    protected function successJsonResponse($data): JsonResponse
    {
        return response()->json([
            'code' => ResponseAlias::HTTP_OK,
            'data' => $data
        ]);
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function errorJsonResponse(string $message, int $code): JsonResponse
    {
        return response()->json([
            'error' => [
                'code'    => $code,
                'message' => $message,
            ]
        ]);
    }
}
