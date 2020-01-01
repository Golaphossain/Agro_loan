<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
//    protected $primaryKey = array('user_id', 'post_id');
//    public $incrementing = false;
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
