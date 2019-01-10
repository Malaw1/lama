<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diluant extends Model
{
    protected $fillable = ['substance_id', 'analyse_id', 'quantite'];
}
