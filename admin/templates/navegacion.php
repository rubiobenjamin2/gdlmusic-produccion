  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class=" info">
        <?php

        /*echo "<pre>";
        var_dump($_SESSION);
        echo"</pre>";*/
        ?>
          <p><?php echo $_SESSION['nombre']; ?></p>
          <a href="#"><i class="far fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de Administración</li>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-tachometer-alt"></i>  &nbsp;<span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dashboard.php"><i class="far fa-circle"></i> Dashboard v1</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-calendar-alt"></i>
          &nbsp;&nbsp;<span>Eventos</span>
          <span class="pull-right-container"></span>
          <i class="fa fa-angle-left pull-right"></i>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-evento.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-evento.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-book"></i>
          &nbsp;&nbsp;<span>Categoria Eventos</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-categorias.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-categoria.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
          <i class="fas fa-user-circle"></i>
          &nbsp;&nbsp;<span>Artistas</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-artistas.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-artista.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
          <i class="fas fa-user-circle"></i>
          &nbsp;&nbsp;<span>Invitados</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-invitados.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-invitado.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-address-card"></i>
          &nbsp;&nbsp;<span>Registrados</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-registrados.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-registro.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>

        <?php if ($_SESSION['nivel'] == 1): ?>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-user"></i>
          &nbsp;&nbsp;<span>Administradores</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-admin.php"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="crear-admin.php"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>

        <?php endif; ?>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-comments"></i>
          &nbsp;&nbsp;<span>Testimoniales</span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fas fa-list-ul" aria-hidden="true"></i> &nbsp;<span>Ver Todos</span> </a></li>
            <li><a href="#"><i class="fas fa-plus-circle" aria-hidden="true"></i> &nbsp;<span>Agregar</span></a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->