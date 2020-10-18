<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .content-message{
            position: fixed;
            z-index: 100; /*Crea una capa nueva por encima, si tenemos una con valor 2 estará a una altura o por encima de una con 
                            valor 1*/
            margin-left:35%; /*Con este margen posicionamos el div donde queramos*/
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(!Auth::check())
                            <li><a class="nav-link" href="{{ url('/login') }}">{{ __('Login')}}</a></li>
                            <li><a class="nav-link" href="{{ url('/register') }}">{{ __('Register')}}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="toast content-message" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
            </div>
          </div>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var everything_correct = "{{__('Everything is correct')}}";
        var passwords_must_match = "{{__('Passwords must match')}}";
        var password_empty = "{{__('Password fields cannot be empty')}}";
        var password_blank = "{{__('Password cannot contain blank spaces')}}";
        var warning = "{{__('Password cannot contain blank spaces')}}";
        function message_box(message, type)
        { 
            msj = '<div class="alert alert-'+type+'" role="alert">'+message+"</div>";
            $(".toast-body").empty();
            $(".toast-header").empty();
            $(".toast-header").append(type);
            $(".toast-body").append(msj);
            $(".content-message").toast({delay: 3000, animation:true});
            $('.content-message').toast('show');
        }
        $(".validatePass").on("keyup",function(e)
        {
            var p1 = $("#password").val();
            var p2 = $("#password_confirm").val();
            console.log(p2);
            var espacios = false;
            var cont = 0;
            while (!espacios && (cont < p1.length)) {
                if (p1.charAt(cont) == " ")
                    espacios = true;
                cont++;
            }
            if (espacios) {
                message_box(password_blank, "warning");
                return false;
            }

            if (p1.length == 0 || p2.length == 0) {
                message_box(password_empty, "warning");
                return false;
            } 

            if (p1 != p2) {
                message_box(passwords_must_match, "warning");
                return false;
            } else {
                message_box(everything_correct, "success");
                return true; 
            }  
        });
    </script>
</body>
</html>
