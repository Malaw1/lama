<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpectroUv extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spectro_uvs';

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
    protected $fillable = ['equipement', 'longueure_onde', 'blanc', 'balance', 'ph', 'analyse_id'];

    
}
