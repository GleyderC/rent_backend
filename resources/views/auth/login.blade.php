<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="#" type="images/favicon.ico">
    <title>Rent</title>
    <link media="all" type="text/css" rel="stylesheet" href="{{url()}}/css/bootstrap.min.css">
    <!--<link media="all" type="text/css" rel="stylesheet" href="/css/style.css">-->
    
    
    <link media="all" type="text/css" rel="stylesheet" href="{{url()}}/css/style-responsive.css">
    <link href="{{url()}}/css/style.css" rel="stylesheet">
    <link href="{{url()}}/css/style-responsive.css" rel="stylesheet">

</head>
<body class="login-bod">
    <div class="container">
        <form method="POST" action="{{url('auth/login')}}" accept-charset="UTF-8" class="cmxform form-signin" id="loginForm">
            {!! csrf_field() !!}
            <div class="form-signin-heading text-center">
                <h1 class="sign-title">Iniciar Sesión</h1>
                <img src="images/login-logo.png" alt="">
            </div>
            <div class="login-wrap">
                <input type="text" class="form-control" name="email" placeholder="Correo" autofocus="">

                <input type="password" class="form-control" name="password" placeholder="Contraseña">

                <button class="btn btn-lg btn-login btn-block" type="submit">
                    <i class="fa fa-check"></i>
                </button>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me" name="remember"> Recuérdame
                </label>
            </div>
        </form>
    </div>
    <div id="jqfrmeme_objdiv"><a target="_blank" href=""><span id="jqfrmeme_objInj" style="opacity: 0.8; background-color: #f00; color: #fff; border: 1px solid black;border-radius: 6px;font-family: Verdana;font-size: 11px;left: 170px;padding: 0 5px 2px;position: absolute;top: 773px;visibility: hidden;">caption</span></a></div>
</body>

</body>
</html