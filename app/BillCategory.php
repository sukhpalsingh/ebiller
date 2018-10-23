<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bill_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'icon_id'];
}
