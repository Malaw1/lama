<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipements';

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
    protected $fillable = ['code', 'appareil', 'fabricant', 'type', 'serie', 'date_installation', 'salle', 'etat', 'document_technique'];

    
}
