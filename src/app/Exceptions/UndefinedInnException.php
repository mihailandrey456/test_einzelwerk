<?php

namespace App\Exceptions;

use Exception;

class UndefinedInnException extends Exception implements DomainException
{
    public function __construct(string $inn)
    {
        $message = "Неизвестный ИНН: " . $inn;
        parent::__construct($message);
    }
}
