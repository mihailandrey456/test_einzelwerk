<?php

namespace App\Exceptions;

interface DomainException
{
	public function getMessage(): string;
}