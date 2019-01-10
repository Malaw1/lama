<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hplc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hplcs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['equipement_id', 'balance', 'pHmetre', 'analyse_id'];

    
}
