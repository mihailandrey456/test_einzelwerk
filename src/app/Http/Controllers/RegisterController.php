<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use Inertia\Inertia;
use Exception;

class RegisterController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    ) {
    }

    public function create()
    {
        return Inertia::render('Auth/Signup');
    }

    public function store(RegisterUserRequest $request)
    {
        $this->service->register($request->toDto());

        return to_route('login');
    }
}
