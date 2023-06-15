<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Interfaces\Models\User\UserInterface;
use App\Models\Bank\Bank;
use App\Traits\HasExportColumnsTrait;
use App\Traits\HasIdTrait;
use App\Traits\MagicMethodsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserInterface
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasIdTrait;
    use MagicMethodsTrait;
    use HasExportColumnsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::MOBILE,
        self::DEPOSIT_NUMBER,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD,
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
        self::PASSWORD => 'hashed',
    ];

    /**
     * @return BelongsToMany
     */
    public function banks(): BelongsToMany
    {
        return $this->belongsToMany(Bank::class);
    }
}
