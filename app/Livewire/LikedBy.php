<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class LikedBy extends Component
{
    public $post;

    protected $listeners = ['likeToggled' => 'getLikesProperty'];

    public function getLikesProperty()
    {
        return $this->post->likes()->count();
    }

    public function getUserIsLikerProperty()
    {
        $likersUsers = $this->post->likes()->get();
        return $likersUsers->contains(auth()->user());

    }

    public function getIsLikedByFollowerProperty(){
        $likersUsers = $this->post->likes()->get();

        foreach($likersUsers as $user){
           if(auth()->user()->is_follower($user) || auth()->user()->is_following($user))
           {
              return true;
              break;
           }

        }
        return false;
    }

   public function getFollowerLikerProperty(){

        $likersUsers = $this->post->likes()->get();

        foreach($likersUsers as $user){

        if(auth()->user()->is_follower($user) || auth()->user()->is_following($user)){

            return $user->username;

            break;
        }
        }

    }

    public function getFirstusernameProperty()
    {
        return $this->post->likes()->first()->username;
    }

    public function render()
    {
        return view('livewire.liked-by');
    }
}
