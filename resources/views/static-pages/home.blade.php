@extends ('layouts.default')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h3>Posts list</h3>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info',['user'=>Auth::user()])
                </section>
            </aside>
        </div>
     @else
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">
            What you are watching is <a href="https://laravel.com/">Laravel</a>
        </p>
        <p>
            Everthing starts from here
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">Enroll Now</a>
        </p>
    </div>
    @endif
@stop