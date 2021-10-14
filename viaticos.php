<?php include 'conectar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/profecoi_UpJ_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/viaticos.css">
    <title>PROFECO - VIATICOS</title>
</head>
<body>
    <?php include 'navbar.php' ?>

    <form action="" method="GET">
        <input type="text" name="buscarE" placeholder="Buscar Empleado" id="buscarE">
        <input type="submit" value="buscar" name="buscar" class="button1">
    </form>

    <div class="container" id="container1">
        <div id="container">
            <div id="col">
                <img src="img/profeco.jpg" alt="">
            </div>
            <div id="col">
                <h3>Oficio de Comisión y Solicitud de Viáticos y Pasajes</h3>
            </div>
        </div>

        <div class="text">
            <div class="texto">
                <p>Para: </p>
            </div>
            <div class="texto">
                <p>Dirección General de Programación, Organización y Presupuesto</p>
                <p>Dirección de Control y Evaluación Financiera.</p>
            </div>
        </div>

        <div class="text uno">
            <div class="texto">
                <p>De: </p>
            </div>
            <div class="texto">
                <p>Unidad Administrativa: <span>804.- ZONA LA PAZ</span></p>
            </div>
        </div>

        <br>

        <div class="text dos">
            <div class="texto">
                <p>N° Oficio de Comisión:    </p>
                <p> BCS.-041/2021</p>
            </div>
            <div class="texto">
                <p>Fecha:                                       </p>
                <p>3 de octubre de 2021</p>
            </div>
        </div>

        <br>

        <div class="text tres">
            <div class="texto">
                <p>Datos del o la Servidor(a) Público(a) Comisionado(a)</p>
            </div>
        </div>

        <div class="text cuatro">
            <div class="texto">
                <p>Nombre: </p>
            </div>
            <div class="texto">
                <?php
                    if(isset($_GET['buscar'])){
                        $busqueda = $_GET['buscarE'];
                        $consulta = "SELECT nombre, aPaterno, aMaterno FROM empleados WHERE numEmpleado = '$busqueda' ";
                        $resultado = mysqli_query($con, $consulta);
                        while($row = mysqli_fetch_array($resultado)){
                ?>
                    <p><?php echo $row['nombre']. " " .$row['aPaterno']. " " .$row['aMaterno']  ?></p>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>

        <br>

        <div class="text cinco">
            <div class="texto">
                <p>Adscripcion:  </p>
                <p>N/A</p>
            </div>
            <div class="texto">
                <p>Nivel:  </p>
                    <?php
                        if(isset($_GET['buscar'])){
                            $busqueda = $_GET['buscarE'];
                            $consulta = "SELECT nivel FROM empleados WHERE numEmpleado = '$busqueda' ";
                            $resultado = mysqli_query($con, $consulta);
                            while($row = mysqli_fetch_array($resultado)){
                    ?>
                        <p><?php echo $row['nivel'] ?></p>
                    <?php 
                            }
                        }
                    ?>
            </div>
            <div class="texto">
                <p>No. Credencial:  </p>
                    <?php
                        if(isset($_GET['buscar'])){
                            $busqueda = $_GET['buscarE'];
                            $consulta = "SELECT numEmpleado FROM empleados WHERE numEmpleado = '$busqueda' ";
                            $resultado = mysqli_query($con, $consulta);
                            while($row = mysqli_fetch_array($resultado)){
                    ?>
                        <p><?php echo $row['numEmpleado'] ?></p>
                    <?php 
                            }
                        }
                    ?>
            </div>
            <div class="texto">
                <p>N° Empleado:  </p>
                    <?php
                        if(isset($_GET['buscar'])){
                            $busqueda = $_GET['buscarE'];
                            $consulta = "SELECT numEmpleado FROM empleados WHERE numEmpleado = '$busqueda' ";
                            $resultado = mysqli_query($con, $consulta);
                            while($row = mysqli_fetch_array($resultado)){
                    ?>
                        <p><?php echo $row['numEmpleado'] ?></p>
                    <?php 
                            }
                        }
                    ?>
            </div>
        </div>

        <br>

        <div class="text seis">
            <div class="texto">
                <p>Período de la Comision</p>
            </div>
        </div>

        <div class="text siete">
            <div class="texto">
                <p>Del día:                                    </p>
                <p><input type="date" style="border:none;"></p>
            </div>
            <div class="texto">
                <p>Al día:                                    </p>
                <p><input type="date" style="border:none;"></p>
            </div>
        </div>

        <br>
        
        <div class="text seis">
            <div class="texto">
                <p>Objetivo de la Comisión</p>
            </div>
        </div>

        <div class="text ocho">
            <div class="texto">
            <p>ATENDER Y REALIZAR NOTIFICACIONES DE EXPEDIENTES FORANEOS Y LOCALES AL MUNICIPIO DE COMONDÚ, BAJA CALIFORNIA SUR.</p>
            </div>
        </div>

        <div class="text ocho">
            <table class="table table-bordered border-dark" id="table">
                <thead>
                    <tr>
                        <th>Viático</th>
                        <th>Internacionales____</th>
                        <th>Nacionales____</th>
                        <th>Anticipados____</th>
                        <th>Devengados____</th>
                        <th><button id="btnAgregar">Agregar</button></th>
                    </tr>
                    <tr>
                        <th>Lugar(es)</th>
                        <th>Moneda</th>
                        <th>Cuota diaria</th>
                        <th>Días</th>
                        <th>Importe</th>
                        <th><button id="btnCalcular">Calcular</button></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        $(document).on('ready', funcionP);
        function funcionP(){
            $("#btnAgregar").on('click', funcionNuevo);
        }
        $("#btnCalcular").on('click', calcular);

        function funcionNuevo(){
            $("#tbody").append(
                $('<tr>').append($('<td>').append(
                    $('<input>').attr('type', 'text').addClass('form-control')
                )).append($('<td>').append(
                    $('<input>').attr('type', 'text').addClass('form-control')
                )).append($('<td>').append(
                    $('<input id="cuota" type="number">').addClass('form-control')
                )).append($('<td>').append(
                    $('<input id="dia" type="number">').addClass('form-control')
                )).append($('<td>').append(
                    $('<p id="final">')
                )).append($('<td>'))
            );           
        }

        function calcular(){
            var total = 0;
            var cuota = $("#cuota").val();
            var dias = $("#dia").val();
            $("#dia").each(function(){
                total = (cuota * dias); 
                $("#final").text('$' + total);
            });
        } 

    </script>
</body>
</html>