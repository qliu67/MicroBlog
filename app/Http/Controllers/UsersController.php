<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // create a user
    public function create() {
        return view('users.create');
    }
}
