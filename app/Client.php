<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'companyName', 'adresse', 'email', 'telephone', 'details', 'date'
    ];
}
