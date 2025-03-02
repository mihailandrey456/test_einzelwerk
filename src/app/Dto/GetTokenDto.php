<?php

namespace App\Dto;

final readonly class GetTokenDto
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
