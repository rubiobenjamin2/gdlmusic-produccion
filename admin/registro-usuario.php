<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/admin.css">




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
  <![endif]-->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../index.php"><b>GDL</b>MUSIC &#9835;</a>

    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Registro de usuario</p>

      <form name="guardar-registro-usuario" id="guardar-registro-usuario" action="modelo-usuario.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control registro" id="usuario" name="usuario" placeholder="Nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control registro" id="correo_usuario" name="correo_usuario" placeholder="Correo electrónico">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control registro" id="password" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control registro" id="repetir_password" name="repetir_password" placeholder="Repetir Password">
          <span id="resultado_password" class="help-block"></span>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback"><span id="error" class="help-block"></span></div>
        
        <div class=" row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->

          <div class="col-xs-4">
            <input type="hidden" name="registro" value="nuevo">
            <button type="submit" class="btn btn-primary registro" id="crear_registro_usuario">Registrar</button>
          </div>

          <!-- /.col -->
        </div>
      </form>

      <!-- <div class=" social-auth-links text-center">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
              <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
          </div> -->

      <a href="login-usuario.php" class="text-center registro">¿Ya tienes una cuenta?</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  <!-- Mensajes o alertas -->
  <script src="js/sweetalert2.all.min.js" charset="UTF-8"></script>

  <script src="js/login-registro-ajax.js"></script>

  <!-- Validar Campos  -->
  <script src="js/app2.js"></script>



</body>

</html>