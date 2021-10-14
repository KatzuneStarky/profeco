<?php 

    include 'conectar.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/profecoi_UpJ_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>PROFECO - BASE DE DATOS - EMPLEADOS</title>
  </head>
  <body>
    <?php 

        include 'navbar.php';

    ?>

    <div class="align-middle">
        <div class="align-middle">
            <div class="align-middle">
                <button id="btnNuevo" class="btn btn-primary" data-toogle="tooltip" title="Nuevo Usuario" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                    </svg>
                    Agregar Usuario
                </button>

                <button type="button" id="btnExport" class="button">
                    <span class="button_text">Exportar a PDF</span>
                    <span class="button_icon">
                        <ion-icon name="cloud-download-outline"></ion-icon>
                    </span>
                </button>
  
                <!-- Modal -->
                <form action="guardar.php" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog    ">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                Agregar Empleado
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Numero Empleado</label>
                                    <input id="nEmpleado"name="nEmpleado" type="number" class="form-control" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="">Apellido(s) paterno</label>
                                    <input id="AP" name="AP" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Apellido(s) materno</label>
                                    <input id="AM" name="AM" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Nombre(s)</label>
                                    <input id="nS" name="nS" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">CURP</label>
                                    <input id="curp" name="curp" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">RFC</label>
                                    <input id="rfc" name="rfc" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Descripción de la Pagaduría</label>
                                    <input id="descP" name="descP" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Numero de Plaza</label>
                                    <input id="nPlaza" name="nPlaza" type="number" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Clave del Puesto</label>
                                    <input id="cdp" name="cdp" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Puesto Nominal</label>
                                    <input id="pN" name="pN" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Puesto Funcional</label>
                                    <input id="pF" name="pF" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Nivel</label>
                                    <input id="nivel" name="nivel" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Tipo de Puesto</label>
                                    <input id="tPuesto" name="tPuesto" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Sexo</label>
                                    <input id="sexo" name="sexo" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Area</label>
                                    <input id="area" name="area" type="text" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Fecha de Ingreso a la Institucion</label>
                                    <input id="fii" name="fii" type="date" class="form-control" >
                                </div>
    
                                <div class="form-group">
                                    <label for="">Fecha de Ingreso al Ultimo Puesto</label>
                                    <input id="fiup" name="fiup" type="date" class="form-control" >
                                </div>
    
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                Cerrar
                            </button>
                            <input type="submit" class="btn btn-primary" id="btnGuardar" value="Guardar" name="guardar">
                            </div>
                        </div>
                        </div>
                    </div>
                </form>

                <table id="tablaEmpleados" class="table align-middle table-responsive table-bordered table-striped table-success">
                    <thead class="align-middle">
                        <tr>
                            <th scope="col">Número de Empleado</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno
                            </th>
                            <th scope="col">Nombre(s)
                            </th>
                            <th scope="col">CURP
                            </th>
                            <th scope="col">RFC
                            </th>
                            <th scope="col">Descripción de la Pagaduría
                            </th>
                            <th scope="col">Número de Plaza
                            </th>
                            <th scope="col">Clave del Puesto
                            </th>
                            <th scope="col">Puesto Nominal
                            </th>
                            <th scope="col">Puesto Funcional
                            </th>
                            <th scope="col">Nivel
                            </th>
                            <th scope="col">Tipo Puesto
                            </th>
                            <th scope="col">Sexo
                            </th>
                            <th scope="col">AREA 
                            </th>
                            <th scope="col">Fecha de Ingreso a la Intitucion
                            </th>
                            <th scope="col">Fecha de Ingreso al ultimo puesto
                            </th>
                        </tr>
                    </thead>
                    <tbody id="bodyEmpleados">
                        <?php
                            $sql = "SELECT * FROM empleados";
                            $resultado = mysqli_query($con, $sql); 
                            while ($filas = mysqli_fetch_array($resultado)){ 
                        ?>
                            <tr>
                                <td><?php echo $filas['numEmpleado'] ?></td>
                                <td><?php echo $filas['aPaterno'] ?></td>
                                <td><?php echo $filas['aMaterno'] ?></td>
                                <td><?php echo $filas['nombre'] ?></td>
                                <td><?php echo $filas['curp'] ?></td>
                                <td><?php echo $filas['rfc'] ?></td>
                                <td><?php echo $filas['descP'] ?></td>
                                <td><?php echo $filas['nPlaza'] ?></td>
                                <td><?php echo $filas['cdp'] ?></td>
                                <td><?php echo $filas['pN'] ?></td>
                                <td><?php echo $filas['pF'] ?></td>
                                <td><?php echo $filas['nivel'] ?></td>
                                <td><?php echo $filas['tPuesto'] ?></td>
                                <td><?php echo $filas['sexo'] ?></td>
                                <td><?php echo $filas['area'] ?></td>
                                <td><?php echo $filas['fii'] ?></td>
                                <td><?php echo $filas['fiup'] ?></td>                        
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">

        var d = new Date();
        var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = d.getFullYear() + '/' +
            ((''+month).length<2 ? '0' : '') + month + '/' +
            ((''+day).length<2 ? '0' : '') + day;

        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tablaEmpleados')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 550
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Reporte " + output + ":" + time + ".pdf");
                }
            });
        });
    </script>
  </body>
</html>