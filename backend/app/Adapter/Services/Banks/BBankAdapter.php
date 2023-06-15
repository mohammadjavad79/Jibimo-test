<?php

namespace App\Adapter\Services\Banks;

use App\Http\Controllers\Controller;
use App\Interfaces\Adapters\Services\Banks\BankAdapterInterface;
use Symfony\Component\HttpFoundation\Response;

class BBankAdapter implements BankAdapterInterface
{
    /**
     * @param array $data Data.
     *
     * @return array
     */
    public function getBalanceResponse(array $data): array
    {
        if (isset($data['balance'])) {
            return [
                Controller::STATUS => Response::HTTP_OK,
                Controller::MESSAGE => __('messages.response_ok'),
                Controller::DATA => [
                    'balance' => $data['balance'],
                ]
            ];
        } else {
            return [
                Controller::STATUS => Response::HTTP_INTERNAL_SERVER_ERROR,
                Controller::MESSAGE => $data[Controller::ERROR],
                Controller::DATA => [
                    'balance' => 0,
                ]
            ];
        }
    }
}
