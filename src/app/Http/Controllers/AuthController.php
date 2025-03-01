<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\TokenRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    function __construct(
        private readonly AuthService $service
    )
    {
    }

    public function register(RegisterUserRequest $request): void
    {
        $this->service->register($request->toDto());
    }

    public function token(TokenRequest $request): Response
    {
        return response($this->service->getToken($request->toDto()));
    }
}
