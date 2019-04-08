<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Substance extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'substances';

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
    protected $fillable = ['designation', 'date_recue',
                            'depositaire', 'unite_recue',
                            'quantite', 'fabricant',
                            'lot', 'date_fab', 'date_exp',
                            'catalog', 'cas', 'certificat',
                            'stockage', 'unite',
                            'forme_galenique', 'container',
                            'prix', 'user_id'];


}
