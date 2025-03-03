<?php

namespace App\Http\Controllers;

use App\Exceptions\UndefinedInnException;
use App\Services\CounterpartyService;
use App\Http\Resources\CounterpartyResource;
use App\Http\Requests\SaveCounterpartyRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class CounterpartyController extends Controller
{
    public function __construct(
        private readonly CounterpartyService $service
    ) {
    }

    public function index(Request $request)
    {
        return Inertia::render('Counterparty/Index', [
            'data' => CounterpartyResource::collection($request->user()->counterparties)
        ]);
    }

    public function store(SaveCounterpartyRequest $request)
    {
        try {
            $this->service->createCounterpartyFor($request->user(), $request->toDto());
        } catch (UndefinedInnException $e) {
            throw ValidationException::withMessages([
                'inn' => [$e->getMessage()]
            ]);
        }
        return to_route('counterparties.index');
    }
}
