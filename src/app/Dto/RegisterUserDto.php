<?php

namespace App\Dto;

final readonly class RegisterUserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
