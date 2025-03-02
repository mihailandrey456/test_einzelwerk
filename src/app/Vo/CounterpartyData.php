<?php

namespace App\Vo;

final readonly class CounterpartyData
{
    public function __construct(
        public string $shortName,
        public string $ogrn,
        public string $fullAddress,
    ) {
    }
}
