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
    <title>PROFECO - BASE DE DATOS - VEHICULOS</title>

    <style>
        body{
            background: #00c6ff;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
    </style>
</head>
<body>
    
    <?php include 'navbar.php' ?>

    <div class="container">
        <button type="button" id="btn" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ingresar nuevo Vehiculo
        </button>

        <button type="button" id="btnExport" class="button" onclick="exportarPDF()">
                <span class="button_text">Exportar a PDF</span>
                <span class="button_icon">
                    <ion-icon name="cloud-download-outline"></ion-icon>
                </span>
        </button>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vehiculos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="guardarVehiculo.php" method="POST">
                    <div class="modal-body">
                        <label for="" class="col-form-label">Area</label>
                        <input type="text" name="area" class="form-control">
                        <label for="" class="col-form-label">Marca</label>
                        <input type="text" name="marca" class="form-control">
                        <label for="" class="col-form-label">Tipo</label>
                        <input type="text" name="tipo" class="form-control">
                        <label for="" class="col-form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control">
                        <label for="" class="col-form-label">Placa Actual</label>
                        <input type="text" name="placaA" class="form-control">
                        <label for="" class="col-form-label">Número de Serie</label>
                        <input type="text" name="numSerie" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar Cambios</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container" style="margin-top: 50px;" id="vehiculos">
            <table class="table table-striped table-primary">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Area</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Placa Actual</th>
                    <th scope="col">Numero de Serie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM vehiculos";
                        $result = mysqli_query($con, $query);
                        while($filas = mysqli_fetch_array($result)){               
                    ?>
                    <tr>
                        <td><?php echo $filas['area'] ?></td>
                        <td><?php echo $filas['marca'] ?></td>
                        <td><?php echo $filas['tipo'] ?></td>
                        <td><?php echo $filas['modelo'] ?></td>
                        <td><?php echo $filas['placaA'] ?></td>
                        <td><?php echo $filas['numSerie'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
        function exportarPDF(){
            const monthNames = ["ENERO", "FEBREOR", "MARZO", "ABRIL", "MAYO", "JUNIO",
            "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
            ];
            const d = new Date();
            html2canvas(document.getElementById('vehiculos'), {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();                
                var docDefinition = {
                    pageMargins: [0,0,0,0],
                    pageOrientation: 'landscape',
                    pageSize: 'A4',
                    content: [{
                        image: data,
                        width: 850,
                    }],
                };
                pdfMake.createPdf(docDefinition).download("Rerporte Vehiculos Totales - Mes " + monthNames[d.getMonth()] + " del " + d.getFullYear() +  ".pdf");
            }
        });
        }
    </script>
</body>
</html>