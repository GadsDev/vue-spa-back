<?php
// Regras de Negocio
namespace App\Services;

use App\User;
use Illuminate\Support\Str;
use App\Events\UserRegistered;
use App\Exceptions\LoginInvalidException;
use App\Exceptions\UserHasBeenTakenException;

class AuthService
{
    public function login(string $email, string $password)
    {
        $login = [
            'email' => $email,
            'password' => $password,
        ];
        if (!$token = auth()->attempt($login)) {
            throw new LoginInvalidException;
        }

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function register(string $first_name, string $last_name, string $email, string $password)
    {
        $user = User::where('email', $email)->exists();
        if (!empty($user)) {
            throw new UserHasBeenTakenException();
        }
        $userPassword = bcrypt($password ?? Str::random(10));
        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'confirmation_token' => Str::random(60),
        ]);

        event(new UserRegistered($user));

        return $user;
    }
}
