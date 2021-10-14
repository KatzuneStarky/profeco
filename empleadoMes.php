<?php include('conectar.php'); ?>
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
    <link href="css/empleadoMes.css" rel="stylesheet">
    <title>PROFECO - EMPLEADO DEL MES</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="uno">
    <button type="button" id="btnExport" class="button" onclick="exportarPDF()">
        <span class="button_text">Exportar a PDF</span>
        <span class="button_icon">
            <ion-icon name="cloud-download-outline"></ion-icon>
        </span>
    </button>

    <form action="" method="GET">
        <input type="text" name="buscarE" placeholder="Buscar Empleado" id="buscarE">
        <input type="submit" value="buscar" name="buscar" class="button1">
    </form>

    <a href="altaEmpleados.php" style="text-decoration:none;">
        <button type="button" class="button">
            <span class="button_text">Base de datos Empleados</span>
            <span class="button_icon">
                <ion-icon name="people-outline"></ion-icon>
            </span>
        </button>
    </a>
    </div>

    <div class="container bg-light" id="eMes">
        <br>
        <img src="img/profeco.jpg" alt="" width="200px" style="position:absolute; margin-left: 10px; margin-top:10px;">
        <h6 class="text-center">PROCURADURÍA FEDERAL DEL CONSUMIDOR</h6>
        <h6 class="text-center">COORDINACIÓN GENERAL DE ADMINISTRACIÓN</h6>
        <h6 class="text-center">DIRECCIÓN GENERAL DE DE RECURSOS HUMANOS</h6>
        <h6 class="text-center">DIRECCIÓN DE ADMINISTRACION DE PERSONAL</h6>
        <br>
        <h6 class="text-center">EVALUACIÓN  AL RECONOCIMIENTO DEL TRABAJADOR DEL MES</h6>
        <h6 class="text-center" id="mes"></h6>  
        <br>
        <p>1. MARCAR CON UNA "X" LA CALIFICACIÓN OBTENIDA</p>
        <p>2. EL FORMATO DEBERÁ SER FIRMADO POR EL TRABAJADOR Y JEFE INMEDIATO O SUPERIOR JERÁRQUICO</p>     
        <h6 class="text-center">PERSONA EVALUADA</h6>
        <br>
            <div class="uno">
                <?php
                    if(isset($_GET['buscar'])){
                        $busqueda = $_GET['buscarE'];
                        $consulta = "SELECT nombre, aPaterno, aMaterno FROM empleados WHERE numEmpleado = '$busqueda' ";
                        $resultado = mysqli_query($con, $consulta);
                        while($row = mysqli_fetch_array($resultado)){
                ?>
                <p class="name">NOMBRE EMPLEADO:</p>
                <p id="nombre"><?php echo $row['nombre']. " " .$row['aPaterno']. " " .$row['aMaterno']  ?></p>
                <?php 
                        }
                    }
                ?>
                <?php
                    if(isset($_GET['buscar'])){
                        $busqueda = $_GET['buscarE'];
                        $consulta = "SELECT numEmpleado FROM empleados WHERE numEmpleado = '$busqueda' ";
                        $resultado = mysqli_query($con, $consulta);
                        while($row = mysqli_fetch_array($resultado)){
                ?>
                <p class="noC">NUMERO CREDENCIAL:</p>
                <p id="credencial"><?php echo $row['numEmpleado'] ?></p>
                <?php 
                        }
                    }
                ?>
            </div>
            <br>
                <div class="uno">

                    <?php
                        if(isset($_GET['buscar'])){
                            $busqueda = $_GET['buscarE'];
                            $consulta = "SELECT descP FROM empleados WHERE numEmpleado = '$busqueda' ";
                            $resultado = mysqli_query($con, $consulta);
                            while($row = mysqli_fetch_array($resultado)){
                    ?>
                        <p class="name">UNIDAD ADMINISTRATIVA:</p>
                        <p id="uAdmin"><?php echo $row['descP'] ?></p>
                    <?php 
                            }
                        }
                    ?>


                    <?php
                        if(isset($_GET['buscar'])){
                            $busqueda = $_GET['buscarE'];
                            $consulta = "SELECT pN FROM empleados WHERE numEmpleado = '$busqueda' ";
                            $resultado = mysqli_query($con, $consulta);
                            while($row = mysqli_fetch_array($resultado)){
                    ?>
                        <p class="noC">PUESTO:</p>
                        <p id="puesto"><?php echo $row['pN'] ?></p>
                    <?php 
                            }
                        }
                    ?>            
            </div>
            <br> 
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th colspan="3"><h6 class="text-center">FACTORES A EVALUAR</h6></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-top border-secondary">
                        <td class=" text-center">ACTITUD DE SERVICIO AL</td>
                        <td>BRINDA ATENCIÓN OPORTUNA Y SERVICIO DE CALIDAD EN TIEMPO Y FORMA</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class=" text-center">CIUDADANO Y/O CLIENTE</td>
                        <td>BRINDA UN TRATO AGRADABLE Y DE RESPETO DEL SERVICIO QUE PRESTA</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class=" text-center">INTERNO</td>
                        <td>CREA UN AMBIENTE DE EMPATIA EN EL CENTRO DE TRABAJO Y BUSCA LA MEJORA CONTINUA</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class=""></td>
                        <td>ESCUCHA Y DA ALTERNATIVAS DE SOLUCIÓN</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>
                    <!-- 2 -->
                    <tr>
                        <td class=" text-center"></td>
                        <td>REALIZA TRABAJOS EXCELENTES, EXCEPCIONALMENTE COMETE ERRORES</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class=" text-center"></td>
                        <td>GENERALMENTE REALIZA BUENOS TRABAJOS</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class=" text-center">CALIDAD DE TRABAJO</td>
                        <td>REQUIERE DE SUPERVISIÓN ESTRECHA</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class=""></td>
                        <td>SU TRABAJO CONTIENE ALTO INDICE DE ERRORES </td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>

                    <!-- 3 -->
                    <tr>
                        <td class=" text-center"></td>
                        <td>EL TRABAJO ENCOMENDADO LO ENTREGA A TOTAL SATISFACCIÓN, UTILIZANDO LA MENOR CANTIDAD DE RECURSOS Y TIEMPO.</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class=" text-center">CANTIDAD Y EFICIENCIA DEL</td>
                        <td>EL TRABAJO ENCOMENDADO LO ENTREGA A TOTAL SATISFACCIÓN.</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class=" text-center">TRABAJO</td>
                        <td>EL TRABAJO ENCOMENDADO LO ENTREGA OCASIONALMENTE A TOTAL SATISFACCIÓN.</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class=""></td>
                        <td>EL TRABAJO ENCOMENDADO SE ENTREGÓ UTILIZANDO MUCHOS RECURSOS Y A DESTIEMPO.</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>

                    <!-- 4 -->
                    <tr>
                        <td class=" text-center"></td>
                        <td>SE DISTINGUE POR SU DISPOSICIÓN AYUDANDO A ALCANZAR LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class=" text-center"></td>
                        <td>TIENE DISPOSICIÓN AYUDANDO A ALCANZAR LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class=" text-center">COLABORACIÓN</td>
                        <td>OCASIONALMENTE MANIFIESTA DISPOSICIÓN EN ALCANZAR LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class=""></td>
                        <td>OBJETA PARTICIPAR EN ALCANZAR LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>

                    <!-- 5 -->
                    <tr>
                        <td class="text-center"></td>
                        <td>REALIZA APORTACIONES SIN NECESIDAD DE SUPERVISIÓN Y GENERA VALOR AL ÁREA</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td>FRECUENTEMENTE REALIZA APORTACIONES EN SU TRABAJO Y GENERA VALOR AL ÁREA</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class="text-center">INICIATIVA</td>
                        <td>OCASIONALMENTE APORTA PROPUESTAS EN SU TRABAJO</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class="text-cener"></td>
                        <td>DIFÍCILMENTE PROPONE ALTERNATIVAS EN SU TRABAJO</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>

                    <!-- 6 -->
                    <tr>
                        <td class="text-center"></td>
                        <td>GENERA TRABAJOS QUE APORTAN UNA MEJORA EN SU DESEMPEÑO LABORAL Y QUE BENEFICIE A SU CENTRO DE TRABAJO.</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td>FRECUENTEMENTE REALIZA TRABAJOS QUE APORTAN UNA MEJORA EN SU DESEMPEÑO LABORAL Y QUE BENEFICIE A SU CENTRO DE TRABAJO</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class="text-center">CREATIVIDAD</td>
                        <td>OCASIONALMENTE REALIZA TRABAJOS QUE APORTAN UNA MEJORA EN SU DESEMPEÑO LABORAL</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class="text-cener"></td>
                        <td class="border-bottom border-secondary">DIFÍCILMENTE PRESENTA TRABAJOS QUE SIGNIFIQUEN UNA MEJORA EN SU DESEMPEÑO LABORAL</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>

                    <!-- 7 -->
                    <tr>
                        <td class="text-center"></td>
                        <td>DESARROLLA SUS ACTIVIDADES CON LOS COMPAÑEROS EN COORDINACIÓN, ARMONÍA, COMUNICACIÓN Y EMPATIA ORIENTADO AL LOGRO DE LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">4</td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td>FRECUENTEMENTE DESARROLLA SUS ACTIVIDADES CON LOS COMPAÑEROS EN COORDINACIÓN, ARMONÍA, COMUNICACIÓN Y EMPATIA ORIENTADO AL LOGRO DE LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">3</td>
                    </tr>
                    <tr>
                        <td class="text-center">TRABAJO EN EQUIPO</td>
                        <td>OCASIONALMENTE DESARROLLA SUS ACTIVIDADES CON LOS COMPAÑEROS EN COORDINACIÓN, ARMONÍA, COMUNICACIÓN Y EMPATIA ORIENTADO AL LOGRO DE LOS OBJETIVOS DEL ÁREA</td>
                        <td class="text-center border border-secondary">2</td>
                    </tr>
                    <tr class="border-bottom border-secondary">
                        <td class="text-cener"></td>
                        <td class="border-bottom border-secondary">MUESTRA NOTABLES FALLAS PARA COLABORAR</td>
                        <td class="text-center border border-secondary">1</td>
                    </tr>
                    <tr class="border border-secondary">
                        <td></td>
                        <td><h6 class="text-center">PUNTUACIÓN TOTAL</h6></td>
                        <td class="text-center border border-secondary"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div id="linea"> </div>
                        <p class="text-center">NOMBRE Y FIRMA DEL EVALUADO</p>
                    </div>
                    <div class="col"></div>
                    <div class="col">
                        <p id="linea" class="font-weight-bold text-center">Lic. Efraín Aguirre Cota</p>
                        <p class="text-center">Jefe de Departamento de Servicios</p>
                    </div>
                </div>
            </div>

            <div class="row" style="width: 100%;">
                <div class="col-sm-4">
                    <p id="algo">EL PRESENTE FORMATO HA SIDO LLENADO Y VALORADO EN EL TOTAL DE FACTORES A CONSIDERAR, MISMO QUE ES SUSCRITO BAJO LA MÁS ESTRICTA RESPONSABILIDAD DEL JEFE INMEDIATO O SUPERIOR JERÁRQUICO, POR LO QUE ES OBJETIVA E IMPARCIAL.</p>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        const mes = document.getElementById('mes');
        const monthNames = ["ENERO", "FEBREOR", "MARZO", "ABRIL", "MAYO", "JUNIO",
        "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
        ];
        const d = new Date();
        mes.innerHTML = "CORRESPONDIENTE AL MES DE " + monthNames[d.getMonth()] + " DEL " + d.getFullYear();
    </script>
    <script>
        function exportarPDF(){
            const credencial = document.getElementById("credencial");
            var num = parseInt(credencial.innerHTML);
            const monthNames = ["ENERO", "FEBREOR", "MARZO", "ABRIL", "MAYO", "JUNIO",
            "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
            ];
            const d = new Date();
            html2canvas(document.getElementById('eMes'), {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();                
                var docDefinition = {
                    pageMargins: [0,0,0,0],
                    pageSize: 'A4',
                    content: [{
                        image: data,
                        width: 600,
                        height: 820,
                    }],
                };
                pdfMake.createPdf(docDefinition).download(num  + " Rerporte mes de " + monthNames[d.getMonth()] + " del " + d.getFullYear() +  ".pdf");
            }
        });
        }
    </script>
</body>
</html>