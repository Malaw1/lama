<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EssaiHplc extends Model
{
    protected $fillable = ['resultat', 'norme', 'analyse_id'];
}
