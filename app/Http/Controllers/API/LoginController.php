<?php

namespace App\Http\Controllers\API;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class LoginController extends Controller
{

    /**
     * @OA\post(
     *     path="/login",
     *     operationId="loginUser",
     *     tags={"Pages"},
     *     summary="login",
     *     security={
     *       {"app_id": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Incorrect Login/Password"
     *     ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     )
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        if(!$token = auth()->attempt([
            'email' => trim($request->get('email')," "),
            'password' => trim($request->get('password'), " "),
        ]))
            return response()->json(['error' => true, 'message' => 'Incorrect Login/Password'], 401);
        return response()->json(['token' => $token]);
    }
}
