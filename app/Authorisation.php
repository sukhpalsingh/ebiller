<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorisation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authorisations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'valid_from', 'valid_until', 'notify_days'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'valid_from',
        'valid_until',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the icon record associated with the account.
     */
    public function file()
    {
        return $this->hasOne('App\File', 'id', 'file_id');
    }
}
