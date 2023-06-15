<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bank\GetBalanceResource;
use App\Models\User\User;
use App\Services\Banks\BankService;

class BankController extends Controller
{
    /**
     * @param User $user User.
     * @param BankService $bankService BankService.
     *
     * @return GetBalanceResource
     */
    public function getBalance(User $user, BankService $bankService): GetBalanceResource
    {
        $response = $bankService->getBalance($user);
        $status = $this->getResponseStatus($response);
        $this->checkIfThereIsError($response);

        return new GetBalanceResource($response, $status);
    }
}
