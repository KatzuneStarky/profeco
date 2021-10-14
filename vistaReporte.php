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
    <title>PROFECO - VISTA PREVIA REPORTES</title>

    <style>
        body{
            background: #ffd89b;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #19547b, #ffd89b);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #19547b, #ffd89b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            overflow: hidden;
        }
    </style>
</head>
<body>
   <?php 
        include 'conectar.php';
        include 'navbar.php';
        $query = "SELECT * FROM reportes WHERE idDoc=".$_GET['id'];
        $result = mysqli_query($con, $query);
        if($datos = mysqli_fetch_array($result)){
            if($datos['nArchivo'] == ""){
   ?> 
        <p>Usted no cuenta con archivos por el momento</p>
   <?php  } else { ?>
        <iframe src="reportes/<?php echo $datos['nArchivo'] ?>" style="position:absolute;top:185px; left:0px; bottom:0px; right:0px; width:100%; height:75%; border:none; margin:0; padding:0;"></iframe>
    <?php  } } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</body>
</html>