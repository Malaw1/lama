<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricant extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fabricants';

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
    protected $fillable = ['company_name', 'adresse', 'telephone', 'email', 'description'];

    
}
