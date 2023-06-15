<?php

namespace App\Interfaces\Adapters\Services\Banks;

interface BankAdapterInterface
{
    /**
     * @param array $data Data.
     *
     * @return array
     */
    public function getBalanceResponse(array $data): array;
}
