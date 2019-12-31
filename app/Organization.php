<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Organization extends Authenticatable
{
    use Notifiable;

    protected $guard='organization';

    protected $fillable = [
        'name','username','email','phone','image','swift_code', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function scopeAuthors($query)
    {
        return $query->where('status','public');
    }

    public function favorite_posts(){

        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
