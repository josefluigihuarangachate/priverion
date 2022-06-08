<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="icon" href="assets/img/icono.png">
        <title>Priverion</title>
        <link href="assets/css/jquery-toast-plugin-master/demos/css/jquery.toast.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/config.js" type="text/javascript"></script>
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-grid.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-grid.rtl.min.css" rel="stylesheet" type="text/css"/>        
        <link href="assets/bootstrap/css/bootstrap-utilities.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-utilities.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-utilities.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-utilities.rtl.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-reboot.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap-reboot.rtl.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/signin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <form class="form-signin" method="POST" action="#">
            <center>
                <img class="mb-4" src="assets/img/logo.png" alt="" height="60"/>
            </center>
            <h3 class="h5 mb-4 font-weight-normal">
                <center>INGRESE SU CUENTA</center>
            </h3>
            <input type="text" id="txtusuario" name="txtusuario" class="form-control" placeholder="* Usuario ó correo electrónico" required>
            <input type="password" id="txtcontrasenia" name="txtcontrasenia" class="form-control" placeholder="* Contraseña" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordar mi cuenta
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btnlogin" style="width: 100%;" type="button">INICIAR SESIÓN</button>
            <p class="mt-5 mb-3 text-muted">
            <center>&copy; 2022-2022</center>
        </p>
    </form>

    <script src="assets/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="assets/css/jquery-toast-plugin-master/demos/js/jquery.toast.js" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="assets/js/crud/login.js" type="text/javascript"></script>
</body>
</html>