<?php

namespace App\Services\Banks;

use App\Adapter\Services\Banks\CBankAdapter;
use App\Interfaces\Adapters\Services\Banks\BankAdapterInterface;
use App\Interfaces\Services\Banks\ForeignBankServiceInterface;
use App\Services\ApiAbstract;
use App\Traits\ForeignBankServiceTrait;

class CBank extends ApiAbstract implements ForeignBankServiceInterface
{
    use ForeignBankServiceTrait;

    public function __construct()
    {
        $this->url = config('api_services.banks.c_bank.base_url');
        $this->bankAdapter = new CBankAdapter();
    }

    /**
     * @param string $depositNumber DepositNumber.
     *
     * @return array
     * @throws \Exception
     */
    public function getBalance(string $depositNumber): array
    {
        return $this->bankAdapter->getBalanceResponse(
            $this->post(
                'bank-c/v1/deposits/get-balance',
                [
                    'deposit_number' => $depositNumber,
                ]
            )
        );
    }
}
