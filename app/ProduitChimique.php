<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitChimique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produit_chimiques';

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
    protected $fillable = ['designation', 'date_recep', 'depositaire', 'unite_recu', 'quantite', 'fabricant', 'lot', 'date_fab', 'date_exp', 'catalog', 'cas', 'prix', 'type', 'user_id'];


}
