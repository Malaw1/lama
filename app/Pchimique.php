<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pchimique extends Model
{
    protected $fillable = [
      'formuleBrute', 'momentDipolaire', 'diametreMoleculaire', 'masseMolaire', 'reactif_id'
    ];
}
