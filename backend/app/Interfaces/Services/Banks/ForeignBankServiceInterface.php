<?php

namespace App\Interfaces\Services\Banks;

interface ForeignBankServiceInterface
{
    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param string $depositNumber DepositNumber.
     *
     * @return array
     */
    public function getBalance(string $depositNumber): array;
}
