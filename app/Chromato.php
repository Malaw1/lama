<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chromato extends Model
{
    protected $fillable = ['volume_injection', 'longueur_onde', 'temperature', 'debit', 'detection', 'colonne', 'analyse_id' ];
}
