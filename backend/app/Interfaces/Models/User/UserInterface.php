<?php

namespace App\Interfaces\Models\User;

use App\Interfaces\Traits\HasExportColumnsInterface;
use App\Interfaces\Traits\HasIdInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface UserInterface extends HasIdInterface, HasExportColumnsInterface
{
    const TABLE = 'users';
    const EMAIL = 'email';
    const NAME = 'first_name';
    const MOBILE = 'mobile';
    const PASSWORD = 'password';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const DEPOSIT_NUMBER = 'deposit_number';

    /**
     * @return BelongsToMany
     */
    public function banks(): BelongsToMany;
}
