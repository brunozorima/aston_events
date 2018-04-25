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
        //an event might have many uploads
        return $this->hasMany('App\Uploads');
    }

    public function likes() {
        return $this->hasMany('App\Likes_table');
    }
}


