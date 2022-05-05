<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
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
}
