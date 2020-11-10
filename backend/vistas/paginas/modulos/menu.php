<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!--=====================================
  LOGO
  ======================================-->
  <a href="inicio" class="brand-link">
  
    <img src="vistas/img/plantilla/icono.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">MyStore</span>

  </a>

  <!--=====================================
  MENÚ
  ======================================-->

  <div class="sidebar">

    <nav class="mt-2">
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- botón Ver sitio -->

        <li class="nav-item">
          
          <a href="<?php echo $ruta; ?>" class="nav-link active" target="_blank">
            
            <i class="nav-icon fas fa-globe"></i>
            
            <p>Ver sitio</p>

          </a>

        </li>

        <?php if ($admin["perfil"] == "Administrador"): ?>

        <!-- Botón página inicio -->

        <li class="nav-item">

          <a href="inicio" class="nav-link">

            <i class="nav-icon fas fa-home"></i>

            <p>Inicio</p>

          </a>

        </li>

        <!-- Botón página administradores -->

       
          
          <li class="nav-item">

            <a href="administradores" class="nav-link">

              <i class="nav-icon fas fa-users-cog"></i>

              <p>Usuarios</p>

            </a>

          </li>

        <?php endif ?>

        <!-- Botón página banner -->

        <li class="nav-item">
          <a href="banner" class="nav-link">
            <i class="nav-icon far fa-images"></i>
            <p>
              Banner
            </p>
          </a>
        </li>

        <!-- Botón página planes -->

        <li class="nav-item">
          
          <a href="planes" class="nav-link">
            
            <i class="nav-icon fas fa-umbrella-beach"></i>
            
            <p>Temporadas</p>
          
          </a>

        </li>

        <!-- Botón página categorías -->

        <li class="nav-item">
          
          <a href="categorias" class="nav-link">
            
            <i class="nav-icon fas fa-list-ul"></i>
            
            <p>Categorías</p>
          
          </a>

        </li>

        <!-- Botón página habitaciones -->

        <li class="nav-item">

          <a href="habitaciones" class="nav-link">

            <i class="nav-icon fab fa-font-awesome-flag"></i>
            
            <p>Subcategorías</p>

          </a>

        </li>

        <li class="nav-item">

          <a href="habitaciones" class="nav-link">

            <i class="nav-icon fas fa-tags"></i>
            
            <p>Etiquetas</p>

          </a>

        </li>

        <!-- Botón página productos -->
        <li class="nav-item">
          
          <a href="productos" class="nav-link">
            
            <i class="nav-icon fab fa-product-hunt"></i>
            
            <p>Productos</p>

          </a>

        </li>

        <li class="nav-item">
          
          <a href="clientes" class="nav-link">
            
            <i class="nav-icon fas fa-truck"></i>
            
            <p>Proveedores</p>

          </a>

        </li>

        <!-- Botón página testimonios -->

        <li class="nav-item">

          <a href="testimonios" class="nav-link">

            <i class="nav-icon fas fa-book-reader"></i>

            <p>Testimonios</p>

          </a>

        </li>

      

        <!-- Botón página recorrido -->

        <li class="nav-item">

          <a href="recorrido" class="nav-link">

            <i class="nav-icon fas fa-city"></i>

            <p>Recorrido</p>

          </a>

        </li>

        <!-- Botón página restaurante -->

        <li class="nav-item">
          
          <a href="restaurante" class="nav-link">
            
            <i class="nav-icon fas fa-business-time"></i>
            
            <p>Empresa</p>

          </a>

        </li>

          <!-- Botón página clientes -->

          <?php if ($admin["perfil"] == "Administrador"): ?>         

          <li class="nav-item">
          
          <a href="clientes" class="nav-link">
            
            <i class="nav-icon fas fa-users"></i>
            
            <p>Clientes</p>

          </a>

          </li>

          <?php endif ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Ventas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ventas" class="nav-link">
                  <i class="fas fa-folder-open nav-icon"></i>
                  <p>Administrar ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-venta" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Crear venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportes" class="nav-link">
                  <i class="fas fa-chart-pie nav-icon"></i>
                  <p>Reporte de ventas</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
          
          <a href="correo" class="nav-link">
            
            <i class="nav-icon fas fa-bullhorn"></i>
            
            <p>Marketing</p>

          </a>

          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Correo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="clientes" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Redactar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leer</p>
                </a>
              </li>
            </ul>
          </li>
    </nav>
  
  </div>

</aside>