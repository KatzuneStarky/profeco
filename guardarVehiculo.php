<?php 

    include 'conectar.php';

    if(isset($_POST['guardar'])){
        $area = $_POST['area'];
        $marca = $_POST['marca'];
        $tipo = $_POST['tipo'];
        $modelo = $_POST['modelo'];
        $placaA = $_POST['placaA'];
        $numSerie = $_POST['numSerie'];

        $sql = "INSERT INTO vehiculos (area, marca, tipo, modelo, placaA, numSerie) 
                VALUES ('$area', '$marca', '$tipo', '$modelo', '$placaA', '$numSerie')";
        $result = mysqli_query($con, $sql);
        if(!$result){
            die("error");
        }

        header("Location: altaVehiculos.php");
    }

?>