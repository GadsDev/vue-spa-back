<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\AuthLoginRequest;

class AuthController extends Controller
{
    private $authService;

    //Injetando o servico AuthService

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(AuthLoginRequest $request){
        $input = $request->validated();
        $this->authService->login();
    }
}
