<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'User made admin successfully');
        return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.edit')->with('user', Auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
        	'name' => $request->name,
        	'about' => $request->about
        ]);

        session()->flash('success', 'Profile updated successfully');
        return redirect()->back();
    }

}
