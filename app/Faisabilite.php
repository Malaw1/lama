<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faisabilite extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faisabilites';

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
<<<<<<< HEAD
    protected $fillable = ['reference', 'molecule', 'objet_essai', 'user_id'];
=======
    protected $fillable = ['reference', 'molecule', 'objet_essai', 'status', 'user_id'];
>>>>>>> develop


}
