<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equalif extends Model
{
    protected $fillable=[
        'dateQualification',
        'equipement_id',
        'details'
    ];
}
