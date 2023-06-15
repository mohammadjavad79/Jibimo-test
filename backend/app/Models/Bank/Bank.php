<?php

namespace App\Models\Bank;

use App\Interfaces\Models\Bank\BankInterface;
use App\Models\BaseModel;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bank extends BaseModel implements BankInterface
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        self::SERVICE_CLASS,
        self::NAME,
    ];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
