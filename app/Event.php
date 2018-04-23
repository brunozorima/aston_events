<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_name','category','description','organiser','date','start_at','end_at','contact','location','postcode','county'];

    public $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function uploads() {
        //a user can have manny events but one event only have one user
        return $this->hasMany('App\Uploads');
    }
}


