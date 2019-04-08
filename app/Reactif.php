<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reactif extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reactifs';

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
    protected $fillable = ['designation', 'date_recep', 'depositaire', 'unite_recue', 'quantite', 'fabricant',
    'lot', 'date_fab',
     'date_exp', 'catalog',
      'cas', 'prix',
      'stockage', 'unite',
      'forme_galenique', 'container',
       'user_id'];


}
