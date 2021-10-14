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
    <title>PROFECO - REPORTES VEHICULOS</title>

    <style>

        body{
            background: #9D50BB;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #6E48AA, #9D50BB);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #6E48AA, #9D50BB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        #btn{
            margin-left: 110px;
            background: rgb(47, 236, 164);
            text-transform: uppercase;
        }

        .button{
            display: inline-flex;
            height: 50px;
            padding: 0;
            margin-left: 30px;
            margin-bottom: 10px;
            background: #38e68f;  /* fallback for old browsers */
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 1s;
        }
        .button:hover{
            background: #0cb37b;  /* fallback for old browsers */
        }

        .button_text, .button_icon{
            display: inline-flex;
            align-items: center;
            padding: 0 15px;
            height: 100%;
        }

        .button_icon{
            font-size: 1.5em;
            color: white;
            background-color: rgba(0, 0, 0, 0.3);
        }

        #uno{
            display: flex;
        }

        #buscarE{
            height: 50px;
            width: 300px;
            margin-left: 15px;
            outline: none;
            border: none;
            background: none;
            color: white;
            border-bottom: 1px solid black;
        }

        .button1{
            width: 100px;
            text-align: center;
            height: 50px;
            text-transform: uppercase;
            padding: 0;
            margin-left: 10px;
            margin-bottom: 50px;
            background: #38e68f;  /* fallback for old browsers */
            border: none;
            outline: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 1s;
        }

        #contenedor{
            background-color: white;
        }

        .tS{
            font-size: 16px;
        }

        .tS1{
            font-size: 14px;
            font-weight: bold;
        }

        #linea{
            margin-left: 5px;
            margin-right: 15px;
            width: 100px;
            font-size: 14px;
            font-weight: bold;
        }

        #linea1{
            margin-left: 5px;
            margin-right: 15px;
            width: 150px;
            font-size: 14px;
            font-weight: bold;
        }

        th, tbody{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container" id="uno">
        <button type="button" id="btnExport" class="button" onclick="exportarPDF()">
                <span class="button_text">Exportar a PDF</span>
                <span class="button_icon">
                        <ion-icon name="cloud-download-outline"></ion-icon>
                </span>
        </button>

        <form action="" method="GET">
            <input type="text" name="buscarE" placeholder="Buscar Vehiculo" id="buscarE">
            <input type="submit" value="buscar" name="buscar" class="button1">
        </form>

        <a href="altaVehiculos.php" style="text-decoration:none;">
            <button type="button" class="button">
                <span class="button_text">Base de datos Vehiculos</span>
                <span class="button_icon">
                    <ion-icon name="car-sport-outline"></ion-icon>
                </span>
            </button>
        </a>
    </div>

    <div class="container" id="contenedor" style="padding-bottom:10px;">
        <div id="uno">
            <img src="img/profeco.jpg" style="width: 200px; height:100px;" alt="">    
            <div class="col-sm-4" style="margin-top:35px; margin-left:20px;">
                <h6 class="tS">PROCURADURIA FEDERAL DEL CONSUMIDOR DELEGACION BAJA CALIFORNIA SUR</h6>
            </div>
            <h6 style="margin-top:35px; right:120px; position:absolute;">F05-L-AUCPV-620</h6>
        </div>
        <div class="col-sm-4" style="margin-top:20px; margin-left:5px;">
                <h6 class="tS">AREA ADMINISTRATIVA</h6>
        </div>
        <br>
        <div class="d-flex justify-content-center" id="uno">
            <?php
                if(isset($_GET['buscar'])){
                    $busqueda = $_GET['buscarE'];
                    $consulta = "SELECT marca FROM vehiculos WHERE placaA = '$busqueda' ";
                    $resultado = mysqli_query($con, $consulta);
                    while($row = mysqli_fetch_array($resultado)){
            ?>
                <p class="tS1">Vehiculo: </p>
                <p id="linea"><?php echo $row['marca'] ?></p>
            <?php 
                    }
                }
            ?>

            <?php
                if(isset($_GET['buscar'])){
                    $busqueda = $_GET['buscarE'];
                    $consulta = "SELECT tipo, modelo FROM vehiculos WHERE placaA = '$busqueda' ";
                    $resultado = mysqli_query($con, $consulta);
                    while($row = mysqli_fetch_array($resultado)){
            ?>
                <p class="tS1">Modelo: </p>
                <p id="linea1"><?php echo $row['tipo'].", ".$row['modelo'] ?></p>
            <?php 
                    }
                }
            ?>

            <?php
                if(isset($_GET['buscar'])){
                    $busqueda = $_GET['buscarE'];
                    $consulta = "SELECT placaA FROM vehiculos WHERE placaA = '$busqueda' ";
                    $resultado = mysqli_query($con, $consulta);
                    while($row = mysqli_fetch_array($resultado)){
            ?>
                <p class="tS1">Placas: </p>
                <p id="linea"><?php echo $row['placaA'] ?></p>
            <?php 
                    }
                }
            ?>
            <p id="mAct" class="tS1" style="position:absolute; margin-left: 1150px;"></p>
        </div>
        <div class="d-flex justify-content-center" id="uno">
            <?php
                    if(isset($_GET['buscar'])){
                        $busqueda = $_GET['buscarE'];
                        $consulta = "SELECT area FROM vehiculos WHERE placaA = '$busqueda' ";
                        $resultado = mysqli_query($con, $consulta);
                        while($row = mysqli_fetch_array($resultado)){
                ?>
                    <p class="tS1">Vehículo Área Asignada: </p>
                    <p id="linea"><?php echo $row['area'] ?></p>
                <?php 
                        }
                    }
                ?>  
        </div>

        <table class="table text-center table-bordered border border-dark" style="margin-top:10px;" id="vitacora">
            <thead>
                <tr class="table-active">
                    <th rowspan="2">Fecha</th>
                    <th rowspan="2">Nombre del Conductor</th>
                    <th rowspan="2">Centro de Costo</th>
                    <th rowspan="2">No. de Credencial</th>
                    <th rowspan="2">Firma</th>
                    <th rowspan="2">Domicilio de Salida</th>
                    <th rowspan="2">Descripcion de los diferentes recorridos durante el servicio</th>
                    <th colspan="3">Salida</th>
                    <th colspan="3">Entrada</th>
                    <th rowspan="2">Km. Recorridos</th>
                </tr>
                <tr class="table-active">
                    <th>Hora</th>
                    <th>Combustible</th>
                    <th>Km.</th>
                    <th>Hora</th>
                    <th>Combustible</th>
                    <th>Km.</th>
                </tr>
            </thead>
            <tbody id="table">
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        const fecha = document.getElementById('mAct');
        const monthNames = ["ENERO", "FEBREOR", "MARZO", "ABRIL", "MAYO", "JUNIO",
        "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
        ];
        const d = new Date();
        fecha.innerHTML = monthNames[d.getMonth()] + " " + d.getFullYear();
    </script>
    <script>
            function exportarPDF(){
                const monthNames = ["ENERO", "FEBREOR", "MARZO", "ABRIL", "MAYO", "JUNIO",
                "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
                ];
                const d = new Date();
                html2canvas(document.getElementById('contenedor'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();                
                    var docDefinition = {
                        pageMargins: [0,0,0,0],
                            pageOrientation: 'landscape',
                        content: [{
                            image: data,
                            width: 530,
                        }],
                    };
                    pdfMake.createPdf(docDefinition).download("BITACORA VEHICULAR - MES " + monthNames[d.getMonth()] + " DEL " + d.getFullYear() +  ".pdf");
                }
            });
            }
        </script>
        <script>
            var fechas = new Date();
            var anio = fechas.getFullYear();
            var mesA = fechas.getMonth()+1;
            var oDia = new Date(anio, mesA, 0).getDate();
            var table = document.getElementById('table');
            
            var newRow = table.insertRow(0); 
            var newCell, newCell1, newCell2, newCell3, newCell4, newCell5, newCell6, newCell7, newCell8, newCell9, newCell10, newCell11, newCell12, newCell13, newCell14;          

            for(var dia = 1; dia <= oDia; dia++){
                newRow = table.insertRow(dia-1);
                newCell = newRow.insertCell(0);
                newCell1 = newRow.insertCell(1);
                newCell2 = newRow.insertCell(2);
                newCell3 = newRow.insertCell(3);
                newCell4 = newRow.insertCell(4);
                newCell5 = newRow.insertCell(5);
                newCell6 = newRow.insertCell(6);
                newCell7 = newRow.insertCell(7);
                newCell8 = newRow.insertCell(8);
                newCell9 = newRow.insertCell(9);
                newCell10 = newRow.insertCell(10);
                newCell11 = newRow.insertCell(11);
                newCell12 = newRow.insertCell(12);
                newCell13 = newRow.insertCell(13);
                newCell.innerHTML = "<td>" + (dia + "/" + mesA + "/" +anio) + "</td>";
                newCell1.innerHTML = "<td>" + "" +"</td>";
                newCell2.innerHTML = "<td>" + "" +"</td>";
                newCell3.innerHTML = "<td>" + "" +"</td>";
                newCell4.innerHTML = "<td>" + "" +"</td>";
                newCell5.innerHTML = "<td>" + "" +"</td>";
                newCell6.innerHTML = "<td>" + "" +"</td>";
                newCell7.innerHTML = "<td>" + "" +"</td>";
                newCell8.innerHTML = "<td>" + "" +"</td>";
                newCell9.innerHTML = "<td>" + "" +"</td>";
                newCell10.innerHTML = "<td>" + "" +"</td>";
                newCell11.innerHTML = "<td>" + "" +"</td>";
                newCell12.innerHTML = "<td>" + "" +"</td>";
                newCell13.innerHTML = "<td>" + "" +"</td>";
            }

        </script>
</body>
</html>