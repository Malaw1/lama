<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PcError extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pc_errors';

  /**
  * The database primary key value.
  *
  * @var string
  */
  protected $primaryKey = 'id';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['designation', 'faisabilite_id'];

}
