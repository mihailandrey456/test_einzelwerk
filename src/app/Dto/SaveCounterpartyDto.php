<?php

namespace App\Dto;

final readonly class SaveCounterpartyDto
{
	function __construct(
		public string $inn
	)
	{
	}
}