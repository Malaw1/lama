<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsRef extends Model
{
    protected $fillable = [
        'dateRecu', 'nomProduit', 'depositaire', 'qtRecu', 'fabricant', 'lot', 'dateFab', 'dateExp', 'certificat'
    ];

}
