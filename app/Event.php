<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_name','category','description','organiser','date','start_at','end_at','contact','location'];

    public $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('App\User');
    }
}


