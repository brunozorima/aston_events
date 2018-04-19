<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    //
    protected $fillable = ['user_id','event_id','image_name','image_size'];

    public $primaryKey = 'event_id';

    public function event() {
        return $this->belongsTo('App\Event');
    }
}
