<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Inertia\Inertia;
use Illuminate\Validation\ValidationException;
use Exception;

class LoginController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    ) {
    }

    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(LoginRequest $request)
    {
        if (!$this->service->attemptLogin($request->toDto())) {
            throw ValidationException::withMessages([
                'email' => ['Неверный email или пароль']
            ]);
        }

        $request->session()->regenerate();
        return to_route('counterparties.index');
    }
}
