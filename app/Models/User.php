<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'trade_key',
        'country',
        'number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function wallets () : HasMany {
        return $this->hasMany(Wallet::class);
    }

    public function deposits () : HasMany {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals () : HasMany {
        return $this->hasMany(Withdrawal::class);
    }

    public function getSuccessfulCredits () {
        //get successful deposits and credit transactions
        $deposits = $this->deposits()->where('status', 'Processed')->sum('amount');
        $receivedTransfers = Transaction::where('receiver_id', $this->id)->sum('amount');
        return $deposits + $receivedTransfers;
    }

    public function getSuccessfulDebits () {
        //get successful withdrawals and debit transactions
        $withdrawals = $this->withdrawals()->where('status', 'Processed')->sum('amount');
        $exernalTransfers = Transaction::where('sender_id', $this->id)->sum('amount');
        return $withdrawals + $exernalTransfers;
    }

    public function balance () {
        return $this->getSuccessfulCredits() - $this->getSuccessfulDebits();
    }
    
}
