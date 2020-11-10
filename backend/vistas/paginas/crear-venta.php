<?php 

  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }

 ?>

<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Crear Venta</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Venta</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-5 col-xs-12">

          <!-- Default box -->
          <div class="card card-success card-outline">

            <div class="card-header">

            </div>
            <!-- /.card-header -->

            <form role="form" method="post" class="formularioVenta">

            <div class="card-body">
              
                <!-- input nombre -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-user"></span>
        
                    </div>
        
                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly> 

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>"> 
    
                </div>

                <!-- input codigo de venta -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-key"></span>
        
                    </div>
        
                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly> 

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>"> 
    
                </div>

                <!-- input cliente -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-users"></span>
        
                    </div>
        
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                        <option value="">Seleccionar cliente</option>

                        <?php
                          /* $item = null;
                          $valor = null;

                          $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                          foreach ($categorias as $key => $value) {

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          } */
                        ?>
                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>
                </div>

                <!-- input agregar producto -->
                <div class="input-group row nuevoProducto mb-3" >
                    
                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- botón para agregar producto -->
                <button type="button" class="btn btn-default invisible btnAgregarProducto">Agregar producto</button>

                <hr class="pb-2">

                <div class="row">

                    <!-- Entrada impuestos y total -->
                    <div class="col-xs-8 pull-right">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Impuesto</th>
                            <th>Total</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td style="width:50%">
                              <div class="input-group">
                                
                                <!-- Entrada para el porcentaje  -->
                                <div class="col-xs-6" style="padding: 0">
                                    <div class="input-group mb-3">
                                        

                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="25" required>

                                        <div class="input-group-append input-group-text">
                                        
                                        <span class="fas fa-percent"></span>

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                                <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                                
                              </div>
                            </td>

                            <td style="width:50%">
                              <!-- Entrada para el porcentaje  -->
                              <div class="col-xs-6" style="padding: 0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append input-group-text">
                                        
                                        <span class="fab fa-stripe-s"></span>

                                        </div>

                                        <input type="number" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" readonly required>

                                        <input type="hidden" name="totalVenta" id="totalVenta">
                                    </div>
                                </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>

                <hr class="pb-2">

                <!-- seleccionar la subcategoría -->
                <div class="form-group row">
                    <div class="col-xs-6" style="padding-right:0px">
                      <div class="input-group mb-3">

                      <div class="input-group-append input-group-text">
                                        
                       <span class="fas fa-money-bill-wave"></span>

                        </div>
                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                          <option value="">Seleccione método de pago</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="TC">Tarjeta Crédito</option>
                          <option value="TD">Tarjeta Débito</option>
                        </select>
                      </div>
                    </div>

                    <div class="cajasMetodoPago"></div>
                    <input type="hidden" name="listaMetodoPago" id="listaMetodoPago" required>
                    
                </div>

                <div class="card-footer">

                <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
       
                </div>
                

            </div>
            <!-- /.card-body -->
            </form>


          </div>
          <!-- /.card -->

        </div>

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

          <!-- Default box -->
            <div class="card card-warning card-outline">
            
                <div class="card-header">

                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    
                    <table class="table table-bordered table-striped dt-responsive tablaVentas">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Imagen</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>    

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>


<!-- MODAL AGREGAR CLIENTE -->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Agregar Cliente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- input nombre -->
            <div class="input-group mb-3">
             
             <div class="input-group-append input-group-text">
               
                <span class="fas fa-user"></span>
 
             </div>
 
             <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Agregar nombre" required>  
 
           </div>

            <!-- input DNI -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-key"></span>
 
                </div>
 
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Agregar DNI" required> 
 
            </div>

            <!-- input Correo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-envelope"></span>
 
                </div>
 
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Agregar E-mail" required>
 
            </div>

            <!-- input Telefono -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-phone"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Agregar Celular" data-inputmask="'mask':'(999) 999-999-999'" data-mask required>
 
            </div>

            <!-- input Dirección -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-map-marker-alt"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Agregar Dirección" required>
 
            </div>

             <!-- input Fecha nacimiento -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-calendar"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Agregar Fecha Nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
 
            </div>


          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>     


    </div>
  </div>
</div>
