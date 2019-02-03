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
}
