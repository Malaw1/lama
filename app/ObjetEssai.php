<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetEssai extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'objet_essais';

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
    protected $fillable = ['code', 'designation', 'forme_galenique', 'date_recue', 'quantite_recue', 'lot', 'date_fab', 'date_exp', 'provenance', 'fabricant_id', 'demande_id'];

    
}
