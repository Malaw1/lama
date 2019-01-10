<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pesages';

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
    protected $fillable = ['ptotal', 'pm', 'tolerance', 'ecart_type', 'uniformite_masse', 'variation', 'equipement_id', 'analyse_id'];

    
}
