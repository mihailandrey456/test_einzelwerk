<?php

namespace App\Dto;

final readonly class LoginDto
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
