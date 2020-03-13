<?php
// Archivo para listar los medicos segun su categoria
    require_once '../Modelo/conexion.php';

    if(isset($_POST)) {      
    $tipoCita = $_POST['categoria'];

    $sql = "SELECT * FROM medicos WHERE CATEGORIA_ID = '$tipoCita' ";

    $result = mysqli_query($conexion,$sql);

    $texto = "<label class='font-weight-bolder font-italic'>Medicos disponibles</label>
              <select id='medico' name='medico' class='form-control'>";

    while ($mostrar = mysqli_fetch_row($result)) {
        $texto = $texto.'<option value='.$mostrar[0].'>'.($mostrar[1].' '.$mostrar[2]).'</option>';
    }

    echo $texto."</select>";
    }

?>