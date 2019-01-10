<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'materiels';

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
    protected $fillable = ['designation', 'type', 'fabricant', 'date_recue', 'quantite_recue', 'lot'];

    
}
