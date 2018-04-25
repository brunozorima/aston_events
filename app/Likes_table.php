<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likes_table extends Model
{
    //
    protected $fillable = ['event_id','num_of_likes','session_id'];
    public $primaryKey = 'event_id';
}
