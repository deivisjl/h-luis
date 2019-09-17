
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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


<style type="text/css">
    #slider{
    height: 350px;
    
    }
    #slider img{
        display: none;
    }
    #slider img:nth-child(1){
        display: block;
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
                            <li><a href="{{}}">Inicio</a></li>
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

        @yield('content')

        <div id="slider" align="center">
            <img src="images/1,1.jpg" width="55%" leight="55%">
            <img src="images/1,2.jpg" width="55%" leight="55%">
            <img src="images/1,3.jpg" width="55%" leight="55%">
            <img src="images/1,4.jpg" width="55%" leight="55%">   
            <img src="images/1,5.jpg" width="55%" leight="55%"> 
            <img src="images/1,6.jpg" width="55%" leight="55%">          
        </div>  
    </body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
        $(function(){
            //Tu cÃģdigo jQuery
            var i = 0;
                $(document).on("ready", main);

                    function main(){
                    var control = setInterval(cambiarSlider, 4000);
                    }

                function cambiarSlider(){
                i++;
                if(i == $("#slider img").size()){
                        i = 0;
                    }
                $("#slider img").hide();
                $("#slider img").eq(i).fadeIn("medium");
                }
        })
    </script>
