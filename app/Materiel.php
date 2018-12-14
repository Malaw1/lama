<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $fillable =[
        'dateRecep', 'nomMateriel', 'type', 'fabricant', 'lot', 'qtRecu'
    ];
}
