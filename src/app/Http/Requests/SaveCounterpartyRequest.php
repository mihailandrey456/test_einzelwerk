<?php

namespace App\Http\Requests;

use App\Dto\SaveCounterpartyDto;
use Illuminate\Foundation\Http\FormRequest;

class SaveCounterpartyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'inn' => ['required', 'string', 'numeric', 'digits_between:10,255'],
        ];
    }

    public function toDto(): SaveCounterpartyDto
    {
        return new SaveCounterpartyDto($this->inn);
    }
}