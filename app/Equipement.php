<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $fillable = [
        'appareil',
        'code',
        'fabricant',
        'type',
        'serie',
        'societeContacter',
        'dateInstallation',
        'documentTechDispo',
        'salle',
        'commentaires',
        'etat'
    ];
}
