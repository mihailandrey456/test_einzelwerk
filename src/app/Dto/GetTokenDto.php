<?php

namespace App\Dto;

final readonly class GetTokenDto
{
	function __construct(
		public string $email,
		public string $password,
	)
	{
	}
}