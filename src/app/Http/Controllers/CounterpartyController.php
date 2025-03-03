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
use OpenApi\Attributes as OAT;
use Inertia\Inertia;

class CounterpartyController extends Controller
{
    public function __construct(
        private readonly CounterpartyService $service
    ) {
    }

    public function index()
    {
        return Inertia::render('Counterparty/Index');
    }
}
