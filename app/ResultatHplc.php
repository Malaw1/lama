<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultatHplc extends Model
{
    protected $fillable = ['moyenne', 'ecart_type', 'cv', 'analyse_id'];
}
