<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionStandardUv extends Model
{
    protected $fillable = ['substance_id', 'titre', 'pesr1', 'pesr2', 'essai1', 'essai2', 'essai3', 'analyse_id'];
}
