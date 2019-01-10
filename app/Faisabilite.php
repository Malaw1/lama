<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faisabilite extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faisabilites';

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
    protected $fillable = ['reference', 'objet_essai', 'molecule'];

    
}
