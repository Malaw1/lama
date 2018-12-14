<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetEssai extends Model
{
    protected $fillable=[
        'dateRecue', 'designation', 'formeGalenique', 'lot', 'fabricant_id', 'dateFab', 'dateExp', 'qtRecue', 'demande_id'
    ];
}
