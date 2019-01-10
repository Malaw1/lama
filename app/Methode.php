<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Methode extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'methodes';

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
    protected $fillable = ['methode', 'parametre_id'];

    
}
