<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaParam extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa_params';

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
    protected $fillable = ['faisabilite_id', 'parametre'];

    
}
