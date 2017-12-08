 <!DOCTYPE html>
 <html>
 <head>
    <title>@yield('title','Sample APP')</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="/css/app.css">
 </head>
 <body>
    @include('layouts._header')

    <main class="container">
       <div class="col-md-offset-1 col-md-10">
           @include('shared._messages')
           @yield('content')
           @include('layouts._footer')
       </div>
    </main>
 <script src="/js/app.js"></script>
 </body>
 </html>
