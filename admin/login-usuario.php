<?php
session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if ($cerrar_sesion) {
    session_destroy();
}
include_once 'funciones/funciones.php'; //conecta a la base de datos
include_once 'templates/header.php';

?>

<body class="hold-transition login-page usuario">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index.php"><b>GDL</b>Music &#9835;</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Inicia Sesión</p>
            <?php
            
           /* session_start();
           echo "<pre>";
           var_dump($_SESSION);
           echo "</pre>";*/
            ?>

            <form name="login-usuario-form" id="login-usuario" method="post" action="modelo-login-usuario.php">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control registro" name="usuario" placeholder="Usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control registro" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <!-- Valor oculto enviado por $_POST -->
                        <input type="hidden" name="login-usuario" value="1"> 
                        <button type="submit" class="btn btn-primary btn-block btn-flat registro">Iniciar Sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <p class="login-box-msg">¿ Es nuevo en <b>GDL</b>Music &#9835; ? &nbsp;&nbsp;&nbsp; <a href="registro-usuario.php" class="registro"><b>Regístrese aquí</b></a></p>

        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</body>




<?php
include_once 'templates/footer.php';

?>