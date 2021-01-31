<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Resources\UserResource;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthVerifyEmailRequest;
use App\Http\Requests\AuthForgotPasswordRequest;

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

    /**
     * @param  AuthRegisterRequest $request
     * @return UserResource
     * @throws HasBeenTakenException
    */
    public function register(AuthRegisterRequest $request){
       $input = $request->validated();

       $user = $this->authService->register(
        $input['first_name'],
        $input['last_name'] ?? '',
        $input['email'],
        $input['password'],
       );

       return (new UserResource($user));
    }

    /**
     * @param  AuthVerifyEmailRequest $request
     * @return UserResource
     * @throws VerifyEmailTokenInvalidException
    */
    public function verifyEmail(AuthVerifyEmailRequest $request){
        $input = $request->validated();

        return $this->authService->verifyEmail($input['token']);

    }

    /**
     * @param  ForgotPasswordRequest $request
     * @return UserResource
    */
    public function forgotPassword(AuthForgotPasswordRequest $request){
        $input = $request->validated();

        return $this->authService->forgotPassword($input['email']);

    }


}
