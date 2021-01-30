<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Resources\UserResource;
use App\Http\Requests\AuthLoginRequest;

class AuthController extends Controller
{
    private $authService;

    //Injetando o servico AuthService

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    /**
     * @param  AuthLoginRequest $request
     * @return UserResource
     * @throws LoginInvalidException
    */
    public function login(AuthLoginRequest $request){
        $input = $request->validated();

        $token =  $this->authService->login($input['email'], $input['password']);

        return (new UserResource(auth()->user()))->additional($token);
    }
}
