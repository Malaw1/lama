<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultatUv extends Model
{
     protected $fillable = ['moy_dosage', 'ecart_type', 'cv', 'analyse_id'];
}
