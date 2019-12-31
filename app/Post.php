<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function organization(){
        return $this->belongsTo(Organization::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
//    public function favorite_to_organization(){
//
//        return $this->belongsToMany(Organization::class)->withTimestamps();
//    }
//    public function comments(){
//        return $this->hasMany(Comment::class);
//    }
    public  function scopeApproved($query)
    {
        return $query->where('is_approved',1);
    }
    public  function scopePublished($query)
    {
        return $query->where('status',1);
    }
}
