<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Test Api for Avada Media",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="othompson@example.com"
 *     )
 * )
 * @OA\Tag(
 *     name="Pages",
 *     description="Pages for mobile app",
 * )
 * @OA\Server(
 *     description="Test Api for Avada Media server",
 *     url="http://test-php-rest-api-avada-media/api"
 * )
 * * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="Authorization",
 *     securityScheme="bearerAuth"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }
}
