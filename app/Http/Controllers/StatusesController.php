<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class StatusesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // publish a blog
    public function store(Request $request) {
        $this->validate($request, [
            'content' => 'required|max:1000'
        ]);
        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        session()->flash('success', 'Your blog is submitted successfully.');
        return redirect()->back();
    }
}
