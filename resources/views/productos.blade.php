<?php
session_start();
if (@$_SESSION['acceso'] <> true) {
    header("Location: " . URL::to('/'));
    exit();
}
?>
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

        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <nav class="navbar fixed-top navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PRIVERION</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="productos">INICIO</a>
                        </li>                        
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cerrarsesion">CERRAR SESIÓN</a>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <br><br><br>

            <div class="row">
                <div class="col-md-3">
                    <h5>REGISTRAR PRODUCTO:</h5>
                    <hr>
                    <form method="POST" action="#">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="txtnombre" placeholder="* Nombre de producto">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="txtcolor" placeholder="* Color de producto">
                        </div>                        
                        <div class="mb-3">
                            <input type="number" class="form-control" id="txtstock" placeholder="* Stock de producto">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="txtprecio" placeholder="* Precio de producto">
                        </div>

                        <button type="button" class="btn btn-primary btnregistrar" style="width: 100%;">REGISTRAR AHORA</button>
                    </form>
                    <hr>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($data)>0)
                                @php ($i = 0)
                                @foreach($data as $datos)
                                @php ($i = $i + 1)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $datos->atr_nombre }}</td>
                                    <td>{{ $datos->atr_color }}</td>
                                    <td>{{ $datos->atr_stock }}</td>
                                    <td>{{ $datos->atr_precio }}</td>
                                    <td>
                            <center>
                                <button onclick="eliminarproducto(<?php echo $datos->atr_idproducto; ?>);" class="btn btn-outline-danger">Eliminar</button>
                                <button onclick="editarproducto(<?php echo $datos->atr_idproducto; ?>);" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
                            </center>
                            </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>No se encontraron datos</td>
                            </tr>
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="staticBackdropLabel">INFORMACION</h5>                        
                    </div>
                    <div class="modal-body">


                        <form method="POST" action="#">
                            <div class="mb-1">
                                <input type="hidden" hidden="hidden" id="txtcodigo" name="txtcodigo">                                
                            </div>

                            <div class="mb-1">
                                <label class="form-label">NOMBRE</label>
                                <input type="email" class="form-control" id="txtnombreupdate" name="txtnombreupdate">                                
                            </div>
                            <div class="mb-1">
                                <label class="form-label">COLOR</label>
                                <input type="text" class="form-control" id="txtcolorupdate" name="txtcolorupdate">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">STOCK</label>
                                <input type="number" class="form-control" id="txtstockupdate" name="txtstockupdate">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">PRECIO</label>
                                <input type="text" class="form-control" id="txtprecioupdate" name="txtprecioupdate">
                            </div>                            
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btncerrar" name="btncerrar" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary btnguardarcambios">GUARDAR CAMBIOS</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>


        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" type="text/javascript"></script>


        <script src="assets/css/jquery-toast-plugin-master/demos/js/jquery.toast.js" type="text/javascript"></script>
        <script>
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $(document).ready(function () {
                                        $(".dropdown-toggle").dropdown();
                                    });
                                    $(document).ready(function () {
                                        $('#example').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copyHtml5',
                                                'excelHtml5',
                                                'csvHtml5',
                                                'pdfHtml5'
                                            ]
                                        });
                                    });
        </script>
        <script src="assets/js/crud/productos.js" type="text/javascript"></script>
    </body>
</html>