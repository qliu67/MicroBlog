@extends('layouts.default')

@section('title', 'Home')
@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h4>Blog history:</h4>
        <hr>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
        <section class="stats mt-2">
          @include('shared._stats', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
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
  @endif
@stop
