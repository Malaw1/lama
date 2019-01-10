<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhaseMobile extends Model
{
    protected $fillable = ['substance', 'pH', 'ajustage', 'analyse_id'];
}
