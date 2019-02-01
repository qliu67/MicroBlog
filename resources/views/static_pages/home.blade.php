@extends('layouts.default')

@section('title', 'Home')
@section('content')
  <div class="jumbotron">
    <h1>Homepage</h1>
    <p class="lead">
      Welcome to use this blog.
    </p>
    <p>
      You can record your life, share your posts with friends, and start a relationship with others.
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Get Started!</a>
    </p>
  </div>
@stop
