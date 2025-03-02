<?php

namespace App\Http\Requests;

use App\Dto\GetTokenDto;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function toDto(): GetTokenDto
    {
        return new GetTokenDto(
            $this->email,
            $this->password
        );
    }
}
