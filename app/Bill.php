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
    protected $fillable = ['name', 'due_on', 'bill_category_id', 'account_id', 'file_id', 'status', 'amount', 'auto_pay'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'due_on',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the icon record associated with the account.
     */
    public function billCategory()
    {
        return $this->hasOne('App\BillCategory', 'id', 'bill_category_id');
    }

    /**
     * Get the icon record associated with the account.
     */
    public function file()
    {
        return $this->hasOne('App\File', 'id', 'file_id');
    }
}
