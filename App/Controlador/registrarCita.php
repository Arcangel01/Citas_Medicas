<?php
        if (isset($_POST)) {
           
            require_once '../Modelo/conexion.php';
            // require_once '../Model/includes/helpers.php';

    if (!isset($_SESSION)) {
         session_start();
       }

        //Recoger los valores de la cita
        $nombreP =$_POST['nombreP'];
        $apellido =$_POST['apellidoP'];
        $asunto =$_POST['asunto'];
        $fecha = $_POST['fecha'];
        $medico = isset($_POST['medico']) ? (int) $_POST['medico'] : false;
        //Array de errores 
        $errores = array();
       // Condiciones que validaran el formulario
        if (empty($nombreP) || is_numeric($nombreP)) {
            array_push($errores, "El nombre no es valido");
        }

        if (empty($apellido) || is_numeric($apellido)) {
            array_push($errores, "El apellido no es valido");
        }

        if (empty($asunto)) {
            array_push($errores, "Llene el campo asunto");
        }

        if (empty($fecha)) {
            array_push($errores, "La fecha no es valida");
        }

        if (empty($medico)) {
            array_push($errores, "Seleccione el medico");
        }

        // Parte para validar las citas de los medicos.
        $query = "SELECT COUNT(FECHA_CITA) FROM reservacion where FECHA_CITA = '$fecha' AND MEDICO_ID = $medico";
        $result = mysqli_query($conexion,$query);
        $validar = mysqli_fetch_row($result);
        //var_dump($validar);
        if ($validar[0] >= 5){
            array_push($errores, "Medico no disponible para este dia");
        }

        if (count($errores)>0){
            echo "<div class='alert alert-danger m-2'>";
            for($i = 0; $i < count($errores); $i++){
                echo "<li>".$errores[$i]."</li>";
            }
        } else {
            echo "<div class='alert alert-success m-2'>
                Cita registrada correctamente!";
        }
        echo "</div>";
        

        $guardar_cita = false;
         
    if (count($errores) == 0) {

        $guardar_cita = true;
        //Insertar orden en la base de datos
        $sql = "INSERT INTO reservacion VALUES(null, '$nombreP' ,'$apellido', '$asunto', '$fecha', $medico);";
       $guardar = mysqli_query($conexion, $sql);

    }else {
        $_SESSION['errores']= $errores;
    }
 }

 ?>