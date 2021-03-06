<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjetEssai extends Model
{
    use SoftDeletes;
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
    protected $fillable = ['code', 'designation', 'conditionnement' , 'forme_galenique', 'date_recue', 'quantite', 'lot', 'date_fab', 'date_exp', 'provenance', 'fabricant', 'demandeur', 'user_id'];


}
