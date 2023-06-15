<?php

namespace App\Services\Banks;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\Banks\ForeignBankServiceInterface;
use App\Models\User\User;
use Symfony\Component\HttpFoundation\Response;

class BankService
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function getBalance(User $user): array
    {
        $userBanks = $user->banks;
        $balance = 0;
        $errors = [];

        foreach ($userBanks as $bank) {
            $bankServiceClass = $bank->getServiceClass();
            /** @var ForeignBankServiceInterface $serviceClass */
            $serviceClass = new $bankServiceClass();
            $response = $serviceClass->getBalance($user->getDepositNumber());
            if ($response[Controller::STATUS] == Response::HTTP_OK) {
                $balance += $response[Controller::DATA]['balance'];
            } else {
                $errors[] = $response[Controller::MESSAGE];
            }
        }

        return [
            Controller::STATUS => Response::HTTP_OK,
            Controller::DATA => [
                'balance' => $balance,
            ],
            Controller::ERROR => $errors
        ];
    }
}
