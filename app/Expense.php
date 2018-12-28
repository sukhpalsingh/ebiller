<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['spent_on', 'spent_at', 'tax', 'amount'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'spent_on',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the icon record associated with the account.
     */
    public function expenseItem()
    {
        return $this->hasMany('App\ExpenseItem', 'expense_id', 'id');
    }

    /**
     * Get the icon record associated with the account.
     */
    public function file()
    {
        return $this->hasOne('App\File', 'id', 'file_id');
    }
}
