 <!DOCTYPE html>
 <html>
 <head>
    <title>@yield('title','Sample APP')</title>
 </head>
 <body>
    <header class="nav navbar-fixed-top navbar-right">
        <div class="container">
            <div>
              <a href="/" id="logo">Sample App</a>
            </div>
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
 </body>
 </html>
