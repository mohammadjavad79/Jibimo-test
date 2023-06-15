<?php

namespace App\Traits;

use App\Interfaces\Adapters\Services\Banks\BankAdapterInterface;

trait ForeignBankServiceTrait
{
    /**
     * @var BankAdapterInterface $bankAdapter Bank Adapter
     */
    protected BankAdapterInterface $bankAdapter;

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
