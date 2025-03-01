<?php

namespace App\Vo;

final readonly class CounterpartyData
{
	function __construct(
		public string $shortName,
		public string $ogrn,
		public string $fullAddress,
	)
	{
	}
}