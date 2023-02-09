<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number'
    ];
    protected $with = ['cashLoanProducts','homeLoanProducts'];

    public function cashLoanProducts()
    {
        return $this->hasOne(CashLoanProduct::class);
    }
    public function homeLoanProducts()
    {
        return $this->hasOne(HomeLoanProduct::class);
    }
}
