<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
  protected $fillable = ['designation', 'date_recep', 'depositaire', 'unite_recue', 'quantite', 'fabricant', 'lot', 'date_fab', 'date_exp', 'catalog', 'cas', 'prix', 'user_id'];

}
