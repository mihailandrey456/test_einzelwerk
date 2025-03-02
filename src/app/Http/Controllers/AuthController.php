<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\TokenRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;
use OpenApi\Attributes as OAT;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $service
    ) {
    }

    #[OAT\Post(path: '/api/auth/register', tags: ['auth'], operationId: 'register', summary: 'register user')]
    #[OAT\Response(response: 200, description: 'successful', content: new OAT\JsonContent())]
    #[OAT\RequestBody(
        required: true,
        content: [new OAT\JsonContent(
            type: 'object',
            required: ['name', 'email', 'password'],
            properties: [
                new OAT\Property(
                    property: 'name',
                    type: 'string',
                ),
                new OAT\Property(
                    property: 'email',
                    type: 'string',
                ),
                new OAT\Property(
                    property: 'password',
                    type: 'string',
                ),
                new OAT\Property(
                    property: 'password_confirmation',
                    type: 'string',
                ),
            ]
        )]
    )]
    public function register(RegisterUserRequest $request): void
    {
        $this->service->register($request->toDto());
    }

    #[OAT\Post(path: '/api/auth/token', tags: ['auth'], operationId: 'token', summary: 'get api token')]
    #[OAT\Response(response: 200, description: 'successful', content: new OAT\JsonContent())]
    #[OAT\RequestBody(
        required: true,
        content: [new OAT\JsonContent(
            type: 'object',
            required: ['email', 'password'],
            properties: [
                new OAT\Property(
                    property: 'email',
                    type: 'string',
                ),
                new OAT\Property(
                    property: 'password',
                    type: 'string',
                ),
            ]
        )]
    )]
    public function token(TokenRequest $request): Response
    {
        return response($this->service->getToken($request->toDto()));
    }
}
