<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    // create a user
    public function create() {
        return view('users.create');
    }

    // show user information
    public function show(User $user) {
        $statuses = $user->statuses()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', compact('user', 'statuses'));
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

    // list all users
    public function index() {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // edit user information
    public function edit(User $user) {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // submit edition
    public function update(User $user, Request $request) {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6']);

        $data = [];
        if ($request->name) {
            $data['name'] = $request->name;
        }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', 'You profile is successfully updated!');

        return redirect()->route('users.show', $user);
    }


    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = $user->name . "'s followings";
        return view('users.show_follow', compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = $user->name . "'s followers";
        return view('users.show_follow', compact('users', 'title'));
    }
}
