<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EssaiUv extends Model
{
    protected $fillable = ['densite_optique', 'resultat', 'norme', 'analyse_id'];
}
