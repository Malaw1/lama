<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demandes';

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
    protected $fillable = ['molecule', 'date_demande', 'client_id', 'description'];

    public function client_id()
    {
        return $this->belongsTo('App\Client');
    }
    
}
