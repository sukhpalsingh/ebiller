<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'date', 'type', 'type_details', 'amount', 'description', 'balance'];

    /**
     * Get the account record associated with the account.
     */
    public function account()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }
}
