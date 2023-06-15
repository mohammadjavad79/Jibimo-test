<?php

namespace App\Models\User;

use App\Interfaces\Models\User\BankUserInterface;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankUser extends BaseModel implements BankUserInterface
{
    use HasFactory;
}
