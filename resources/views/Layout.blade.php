<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">


        {{--
            @if (App::isLocale('ar')) {
                <link rel='stylesheet' id='bootstrap-rtl-css' href='PATH/bootstrap.rtl.min.css?ver=3.4.0-alpha.6.1' type='text/css' />
            }else{
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                crossorigin="anonymous">
        }@endif
                --}}

</head>

<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Blog App
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">


                {{--  <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav  ">
                    <li><a href="/lang/ar">Arabic</a></li>
                    <li><a href="/lang/en">English</a></li>
                </ul>  --}}


                {{--  @guest  --}}


                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="/admin/posts">Posts</a></li>
                    <li><a href="/admin/categories">Categories</a></li>
                    <li><a href="/admin/comments">Comments</a></li>
                    <li><a href="/admin/tags">Tags</a></li>
                    <li><a href="/admin/users">Users</a></li>
                </ul>

             {{--  @else  --}}

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="logout" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

                {{--  @endguest  --}}
            </div>
        </div>
    </nav>

    <div class="container">

        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </div>
</body>

</html>
