<?php

namespace App\Services;

use App\Dto\GetTokenDto;
use App\Dto\RegisterUserDto;
use App\Dto\LoginDto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class AuthService
{
    private const TOKEN_NAME = "API";

    public function register(RegisterUserDto $dto): void
    {
        $user = new User();
        $user->name = $dto->name;
        $user->email = $dto->email;
        $user->password = Hash::make($dto->password);
        $user->saveOrFail();
    }

    public function getToken(GetTokenDto $dto): string
    {
        $user = User::firstWhere('email', $dto->email);
        if (!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Неверный email или пароль']
            ]);
        }
        return $user->createToken(self::TOKEN_NAME)->plainTextToken;
    }

    public function attemptLogin(LoginDto $dto): bool
    {
        return Auth::attempt(['email' => $dto->email, 'password' => $dto->password]);
    }
}
