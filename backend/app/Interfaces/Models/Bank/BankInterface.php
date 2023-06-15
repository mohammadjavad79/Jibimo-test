<?php

namespace App\Interfaces\Models\Bank;

use App\Interfaces\Models\BaseModelInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface BankInterface extends BaseModelInterface
{
    const TABLE = 'banks';
    const SERVICE_CLASS = 'service_class';
    const NAME = 'name';

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany;
}
