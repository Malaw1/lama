<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaEquipement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa_equipements';

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
    protected $fillable = ['faisabilite_id', 'equipement'];

    
}
