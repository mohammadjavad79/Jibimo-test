<?php

namespace App\Services\Banks;

use App\Adapter\Services\Banks\ABankAdapter;
use App\Interfaces\Services\Banks\ForeignBankServiceInterface;
use App\Services\ApiAbstract;
use App\Traits\ForeignBankServiceTrait;

class ABank extends ApiAbstract implements ForeignBankServiceInterface
{
    use ForeignBankServiceTrait;

    public function __construct()
    {
        $this->url = config('api_services.banks.a_bank.base_url');
        $this->bankAdapter = new ABankAdapter();
    }

    /**
     * @param string $depositNumber User DepositNumber.
     *
     * @return array
     * @throws \Exception
     */
    public function getBalance(string $depositNumber): array
    {
        return $this->bankAdapter->getBalanceResponse(
            $this->post(
                'bank-a/v1/deposits/get-balance',
                [
                    'deposit_number' => $depositNumber,
                ]
            )
        );
    }
}
