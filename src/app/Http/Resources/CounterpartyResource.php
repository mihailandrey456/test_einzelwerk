<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OAT;

#[OAT\Schema(
    title: 'Counterpary',
    properties: [
        new OAT\Property(property: 'id', type: 'int'),
        new OAT\Property(property: 'inn', type: 'string'),
        new OAT\Property(property: 'name', type: 'string'),
        new OAT\Property(property: 'ogrn', type: 'string'),
        new OAT\Property(property: 'address', type: 'string'),
    ]
)]
class CounterpartyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'inn' => $this->inn,
            'name' => $this->name,
            'ogrn' => $this->ogrn,
            'address' => $this->address,
        ];
    }
}
