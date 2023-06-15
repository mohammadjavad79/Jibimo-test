<?php

namespace App\Interfaces\Models\User;

use App\Interfaces\Models\BaseModelInterface;
use App\Models\BaseModel;

interface BankUserInterface extends BaseModelInterface
{
    const TABLE = 'bank_user';
    const USER_ID = 'user_id';
    const BANK_ID = 'bank_id';
}
