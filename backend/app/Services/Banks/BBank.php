<?php

namespace App\Services\Banks;

use App\Adapter\Services\Banks\BBankAdapter;
use App\Interfaces\Services\Banks\ForeignBankServiceInterface;
use App\Services\ApiAbstract;
use App\Traits\ForeignBankServiceTrait;

class BBank extends ApiAbstract implements ForeignBankServiceInterface
{
    use ForeignBankServiceTrait;

    public function __construct()
    {
        $this->url = config('api_services.banks.b_bank.base_url');
        $this->bankAdapter = new BBankAdapter();
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
                'bank-b/v1/deposits/get-balance',
                [
                    'deposit_number' => $depositNumber,
                ]
            )
        );
    }
}
