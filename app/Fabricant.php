<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricant extends Model
{
    protected $fillable=[
        'companyName', 'adresse', 'email', 'telephone'
    ];
}
