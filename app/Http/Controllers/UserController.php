<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index', compact('user'));
    }

    //
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //
    public function update(User $user, UpdateUserProfileRequest $request)
    {
        
        $data = $request->safe()->collect();

        if($request->has('password') && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        if ($data->has('image')) {
            $path = $request->file('image')->store('users', 'public');
            $data['image'] = '/' . $path;
        }

        $data['private_account'] = $request->has('private_account');

        $user->update($data->toArray());

        session()->flash('success', __('You profile has been updated successfully!'));
        return redirect()->route('user_profile', $user);
    }

    //
    public function follow(User $user)
    {
        auth()->user()->follow($user);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);
        return back();
    }


}
