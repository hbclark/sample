@extends('layouts.default')
@section('title','all users')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        @if(Auth::check())
        <h1>All users</h1>
        <ul class="users">
            @foreach($users as $user)
                @include('shared._user')
            @endforeach
        </ul>
       {!! $users->render() !!}
        @else
            <h3>Please <a href="{{route('login')}}">Login</a> First!</h3>
        @endif
    </div>

@stop