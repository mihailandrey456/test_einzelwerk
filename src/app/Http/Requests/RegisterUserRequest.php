<?php

namespace App\Http\Requests;

use App\Dto\RegisterUserDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    public function toDto(): RegisterUserDto
    {
        return new RegisterUserDto(
            $this->name,
            $this->email,
            $this->password
        );
    }
}