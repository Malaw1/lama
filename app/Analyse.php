<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{

    protected $fillable=[
        'code', 'objetessai', 'dci', 'dosage', 'lot', 'peremptio'
    ];
}
