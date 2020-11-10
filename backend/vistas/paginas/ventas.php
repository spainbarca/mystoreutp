<?php 

  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }

  $xml = ControladorVentas::ctrDescargarXML();  

  if($xml){

    rename($_GET["xml"].".xml", "XML/".$_GET["xml"].".xml");
  
    echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';
  
  }  

 ?>

<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Administrar ventas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar ventas</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card card-info card-outline">

            <div class="card-header">

                <a href="crear-ventas">
                <button class="btn btn-primary">
                Agregar venta
                </button>
                </a>

                <button type="button" class="btn btn-default pull-right float-right" id="daterange-btn">
                    <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Código Factura</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Medio de pago</th>
                        <th>Neto</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php

                    if(isset($_GET["fechaInicial"])){
                        
                        $fechaInicial = $_GET["fechaInicial"];
                        $fechaFinal = $_GET["fechaFinal"];
                    }else{
                        
                        $fechaInicial = null;
                        $fechaFinal = null;
                    }
                    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

                    foreach ($respuesta as $key => $value) {
                        echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["codigo"].'</td>';
            
                            $itemCliente = "id";
                            $valorCliente = $value["id_cliente"];
            
                            $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
            
                            echo '<td>'.$respuestaCliente["nombre"].'</td>';
            
                            $itemUsuario = "id";
                            $valorUsuario = $value["id_vendedor"];
            
                            $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
            
                            echo '<td>'.$respuestaUsuario["nombre"].'</td>
            
                            <td>'.$value["metodo_pago"].'</td>
                            <td>$ '.number_format($value["neto"],2).'</td>
                            <td>$ '.number_format($value["total"],2).'</td>
                            <td>'.$value["fecha"].'</td>
            
                            <td>
                                <div class="btn-group">

                                <a class="btn btn-success" href="index.php?ruta=ventas&xml='.$value["codigo"].'">xml</a>
                                    
                                <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">
                                <i class="fa fa-print"></i></button>';

                                if($_SESSION["perfil"]=="1"){
                                    echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
            
                                    <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                                }
                                echo '</div>  
                            </td>
                            </tr>';
                        }

                    //var_dump($respuesta);
                    ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
       
            </div>
            <!-- /.card-footer-->

          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>

