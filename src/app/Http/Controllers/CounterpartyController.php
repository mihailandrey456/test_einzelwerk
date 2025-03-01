<?php

namespace App\Http\Controllers;

use App\Services\CounterpartyService;
use App\Models\User;
use App\Http\Requests\SaveCounterpartyRequest;
use App\Http\Resources\CounterpartyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Exceptions\DomainException;

class CounterpartyController extends Controller
{
	function __construct(
		private readonly CounterpartyService $service
	)
	{
	}

	public function index(Request $request)
	{
		return CounterpartyResource::collection($request->user()->counterparties);
	}

	public function store(SaveCounterpartyRequest $request)
	{
		return new CounterpartyResource($this->service->createCounterpartyFor($request->user(), $request->toDto()));
	}
}
