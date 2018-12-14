<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pphysique extends Model
{
    protected $fillable = [
        'tempFusion', 'tempEbulution', 'solubilite', 'parametreDeSolubilite', 'masseVolumique', 'tempAutoInflamation', 'limitesExplosiviteAir', 'pressionVapeurSaturante', 'pressionVapeurSaturante', 'ViscositeDynamique', 'pointCritique', 'reactif_id'
    ];
}
