<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaParaMethode extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa_para_methodes';

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
    protected $fillable = ['parametre', 'methode', 'faisabilite_id'];

    
}
