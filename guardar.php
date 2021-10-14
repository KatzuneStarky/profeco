<?php 

    include 'conectar.php';

    if(isset($_POST['guardar'])){
        $nEmpleado = $_POST['nEmpleado'];
        $AP = $_POST['AP'];
        $AM = $_POST['AM'];
        $nS = $_POST['nS'];
        $curp = $_POST['curp'];
        $rfc = $_POST['rfc'];
        $descP = $_POST['descP'];
        $nPlaza = $_POST['nPlaza'];
        $cdp = $_POST['cdp'];
        $pN = $_POST['pN'];
        $pF = $_POST['pF'];
        $nivel = $_POST['nivel'];
        $tPuesto = $_POST['tPuesto'];
        $sexo = $_POST['sexo'];
        $area = $_POST['area'];
        $fii = $_POST['fii'];
        $fiup = $_POST['fiup'];

        $query = "INSERT INTO empleados(numEmpleado, aPaterno, aMaterno, nombre, curp, rfc, descP, nPlaza, cdp, pN, pF, nivel, tPuesto, sexo, area, fii, fiup) VALUES 
            ('$nEmpleado', '$AP', '$AM', '$nS', '$curp', '$rfc', '$descP', '$nPlaza', '$cdp', '$pN', '$pF', '$nivel', '$tPuesto', '$sexo', '$area', '$fii', '$fiup')";
        $result = mysqli_query($con, $query);
        if(!$result){
            die("error");
        }

        header("Location: altaEmpleados.php");
    }

?>