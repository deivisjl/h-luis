<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
















        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 40px;
                
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

            .m-b-md {
                margin-bottom: 0px;
            }

            .medicina {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 400;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

                 height: 10vh;


                   margin-bottom: 0px;
            }

        </style>

        <style type="text/css">
            
header{
    width:100%;
    
    }   

header nav{
        width:100%;
        margin:0px;
        background-color:#024059;
    }
    
header nav ul {
        overflow:hidden;
        list-style:none;
        
    }
    
header nav ul li {
    float:left;
        
    }

header nav ul li a {
        color:white;
        padding:25px;
        display:inline-block;
        text-decoration:none;
    }

header nav ul li a:hover {
    background-color: white;
    color:black;    
    }   

header nav ul li a: hover {
    display:none;   
    }

        </style>


    </head>



    <body>

        <table width="100%">
            <tr bgcolor="lightgreen">
                <td>                

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarme</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" >
                <div class="title m-b-md">
                    MEDICINA NATURAL
                </div>
                <!--
                <div class="links">
                    <a href="https://laravel.com/docs">INICIO</a>
                    <a href="https://laracasts.com">PRODUCTOS</a>
                    <a href="https://laracasts.com">NUESTRA VISION</a>
                    <a href="https://laracasts.com">NUESTRA MISION</a>
                    <a href="https://laravel-news.com">CONTACTO</a>
                    
                </div>
            -->
            </div>
        </div>
    </td>
    </tr>
    <tr>
        <td>
         <div class="medicina" >
    
                <header>
                    <nav>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Nuestra Vision</a></li>
                            <li><a href="#">Nuestra Mision</a></li>
                            <li><a href="#">Contactenos</a></li>
                            
                        </ul>           
                    </nav>      
                </header>   

            </div>
        </td>
    </tr>   
    </table>
    <hr>
        @yield('content')
        
    </body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
