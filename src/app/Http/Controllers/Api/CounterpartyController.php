<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CounterpartyService;
use App\Models\User;
use App\Http\Requests\SaveCounterpartyRequest;
use App\Http\Resources\CounterpartyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Exceptions\DomainException;
use OpenApi\Attributes as OAT;

class CounterpartyController extends Controller
{
    public function __construct(
        private readonly CounterpartyService $service
    ) {
    }

    #[OAT\Get(
        path: '/api/counterparties',
        tags: ['counterparties'],
        operationId: 'index',
        summary: 'get all counterparties',
        security: [['bearerAuth' => []]]
    )]
    #[OAT\Response(
        response: 200,
        description: 'successful',
        content: new OAT\JsonContent(
            type: 'array',
            items: new OAT\Items(type: CounterpartyResource::class)
        ),
    )]
    public function index(Request $request)
    {
        return CounterpartyResource::collection($request->user()->counterparties);
    }

    #[OAT\Post(
        path: '/api/counterparties',
        tags: ['counterparties'],
        operationId: 'store',
        summary: 'create counterparty',
        security: [['bearerAuth' => []]]
    )]
    #[OAT\RequestBody(
        required: true,
        content: [new OAT\JsonContent(
            type: 'object',
            required: ['inn'],
            properties: [
                new OAT\Property(
                    property: 'inn',
                    type: 'string',
                ),
            ]
        )]
    )]
    #[OAT\Response(
        response: 200,
        description: 'successful',
        content: [new OAT\MediaType(mediaType: 'application/json', schema: new OAT\Schema(ref: CounterpartyResource::class))],
    )]
    public function store(SaveCounterpartyRequest $request)
    {
        return new CounterpartyResource($this->service->createCounterpartyFor($request->user(), $request->toDto()));
    }
}
