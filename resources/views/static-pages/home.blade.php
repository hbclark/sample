@extends ('layouts.default')

@section('content')
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
@stop