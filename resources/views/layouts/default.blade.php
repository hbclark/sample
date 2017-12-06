 <!DOCTYPE html>
 <html>
 <head>
    <title>@yield('title','Sample APP')</title>
     <link rel="stylesheet" href="/css/app.css">
 </head>
 <body>
    <header class="nav navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="col-md-offset-1 col-md-10">
                <a href="/" id="logo">Sample App</a>
                <nav>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/help">Help Page</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
 </body>
 </html>
