<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like(Post $post)
    {
        auth()->user()->likes()->toggle($post);
        return back();
    }
}
