<?php 

    include 'conectar.php';

    if(isset($_POST['subir'])){

        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino = "reportes/".$nombre;

        if($nombre != ""){
            if(copy($ruta, $destino)){
                $titulo = $_POST['titulo'];
                $descrip = $_POST['descripcion'];
                $sql = "INSERT INTO reportes (titulo, descripcion, tamano, tipo, nArchivo) VALUES ('$titulo', '$descrip', '$tamanio', '$tipo', '$nombre')";
                $result = mysqli_query($con, $sql);
                if($result){
                    header("Location: reportes.php");
                }
            }else{
                echo "Error";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/profecoi_UpJ_icon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="stylesheet" href="css/reportes.css">
        <title>PROFECO - REPORTES VARIOS</title>
    </head>
    <body>
    
        <?php include("navbar.php"); ?>
        <!-- Button trigger modal -->
        <button type="button" id="btn" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ingresar Reporte
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reportes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="" class="col-form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control">
                        <label for="" class="col-form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                        <label for="" class="col-form-label">Ingresar Archivo</label>
                        <input type="file" name="archivo" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="subir">Guardar Cambios</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container" style="margin-top: 50px;">
            <table class="table table-striped table-primary">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Nombre Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM reportes";
                        $result = mysqli_query($con, $query);
                        while($filas = mysqli_fetch_array($result)){               
                    ?>
                    <tr>
                        <td><?php echo $filas['titulo'] ?></td>
                        <td><?php echo $filas['descripcion'] ?></td>
                        <td><a href="vistaReporte.php?id=<?php echo $filas['idDoc'] ?>"><?php echo $filas['nArchivo'] ?></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    </body>
</html>