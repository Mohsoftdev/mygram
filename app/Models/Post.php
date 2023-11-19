<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'description', 'slug'];
    public $images = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_post');
    }


    public function likedByUser(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function add_image($image)
    {

        array_push($this->images , $image);

    }




}
