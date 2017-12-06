 <!DOCTYPE html>
 <html>
 <head>
    <title>@yield('title','Sample APP')</title>
     <link rel="stylesheet" href="/css/app.css">
 </head>
 <body>
    @include('layouts._header')

    <main class="container">
       <div class="col-md-offset-1 col-md-10">
           @yield('content')
           @include('layouts._footer')
       </div>
    </main>
 </body>
 </html>
