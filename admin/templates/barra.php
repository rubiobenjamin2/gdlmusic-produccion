
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
  <?php
include_once 'templates/header.php';
?>
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>WC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GDL</b>WebCamp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Usuario: <?php echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
         
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <a  class="btn btn-primary btn-flat" href="editar-admin.php?id=<?php echo $_SESSION['id']; ?>" role="button">Ajustes</a>
                </div>
                <div class="pull-right">
                <a class="btn btn-primary btn-flat" href="login.php?cerrar_sesion=true" role="button" >Cerra Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->