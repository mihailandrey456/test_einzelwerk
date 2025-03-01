<?php

namespace App\Services;

use App\Dto\SaveCounterpartyDto;
use App\Models\User;
use App\Models\Counterparty;
use Dadata\DadataClient;
use App\Vo\CounterpartyData;
use App\Exceptions\UndefinedInnException;

final class CounterpartyService
{
	function __construct(
		private readonly DadataClient $dadata
	)
	{
	}

	public function createCounterpartyFor(User $user, SaveCounterpartyDto $dto): Counterparty
	{
		$counterparty = new Counterparty();
		$counterparty->inn = $dto->inn;
		$counterparty->user_id = $user->id;
		
		$partyData = $this->fetchCounterpartyData($dto->inn);
		$counterparty->name = $partyData->shortName;
		$counterparty->ogrn = $partyData->ogrn;
		$counterparty->address = $partyData->fullAddress;
		
		$counterparty->saveOrFail();
		return $counterparty;
	}

	private function fetchCounterpartyData(string $inn): CounterpartyData
	{
		$response = $this->dadata->findById("party", $inn, 1);
		if (empty($response)) {
			throw new UndefinedInnException($inn);
		}

		// todo: проверить наличие ключей!
		$partyData = $response[0]["data"];
		return new CounterpartyData(
			$partyData["name"]["short_with_opf"],
			$partyData["ogrn"],
			$partyData["address"]["unrestricted_value"]
		);
	}
}