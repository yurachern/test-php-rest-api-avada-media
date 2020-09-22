<?php


namespace App\Api;

/**
 * @OA\Schema(
 *     description="Login data request",
 *     type="object",
 *     title="Login data request",
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *     title="email",
     *     description="User email",
     *     format="string",
     *     example="test@ukr.net"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="password",
     *     description="User password",
     *     format="string",
     *     example="123"
     * )
     *
     * @var int
     */
    public $password;
}
