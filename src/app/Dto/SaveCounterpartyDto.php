<?php

namespace App\Dto;

final readonly class SaveCounterpartyDto
{
    public function __construct(
        public string $inn
    ) {
    }
}
