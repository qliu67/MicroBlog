<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // create a user
    public function create() {
        return view('users.create');
    }

    // show user information
    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    // store user information
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)]);

        Auth::login($user);
        session()->flash('success', 'Welcome to use your personal blog!');
        return redirect()->route('users.show', [$user]);
    }
}
