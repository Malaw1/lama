<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestDemande extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_demandes';

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
    protected $fillable = ['parametre', 'demande_id'];

    
}
