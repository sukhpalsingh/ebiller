<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'icon_id'];

    /**
     * Get the icon record associated with the account.
     */
    public function icon()
    {
        return $this->hasOne('App\Icon', 'id', 'icon_id');
    }
}
