
<?php
$conexion = new mysqli("localhost", "root", "", "db_citas_medicas");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
// echo $conexion->host_info . "\n";
// echo 'nos conectamos mijo';


//echo $mysqli->host_info . "\n";
?>
