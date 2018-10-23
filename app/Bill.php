<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'due_on', 'bill_category_id', 'account_id', 'status', 'amount', 'auto_pay'];

    /**
     * Get the icon record associated with the account.
     */
    public function billCategory()
    {
        return $this->hasOne('App\BillCategory', 'id', 'bill_category_id');
    }
}
