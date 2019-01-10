<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaSubstance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa_substances';

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
    protected $fillable = ['faisabilite_id', 'substance'];

    
}
