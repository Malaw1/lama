<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReactifUsed extends Model
{
    protected $fillable = ['analyse_id', 'reactif_id', 'quantite'];
}
