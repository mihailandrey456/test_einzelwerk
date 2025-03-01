<?php

namespace App\Dto;

final readonly class RegisterUserDto
{
	function __construct(
		public string $name,
		public string $email,
		public string $password,
	)
	{
	}
}