<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reactif extends Model
{
    protected $fillable = [
        'dateRecu', 'nomProduit', 'depositaire', 'qtRecu', 'fabricant', 'lot', 'dateFab', 'expDate', 'conditionnement'
    ];

    protected $hidden = [
        'user_id'
    ];
}
