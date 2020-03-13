<?php 
require_once 'Modelo/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>EPS SALUD</title>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-dark bg-primary m-0">
        <a class="navbar-brand" href="#">
            <img src="Assets/img/icon.png" class="img-rounded" width="70" height="50" alt="">
        </a>
        <h1 class="font-weight-bolder font-italic text-light">Bienvenidos!</h1>
        <h3 class="font-italic text-light">Salud Mortal EPS</h3>
    </nav>
    <!-- Parte principal donde esta el formulario -->
    <div class="container p-4">
     <div class="jumbotron jumbotron-fluid m-4 p-4">
        <div class="container">
        <img src="Assets/img/reg.jpg" class="imagen" width="250" height="115">
            <h1 class="display-3 font-weight-bolder font-italic">Registra las citas medicas!</h1>
            <p class="font-italic">Sistema para el registro de citas medicas de <strong>Salud Mortal EPS</strong>.</p>
            <button href="#MyCollapse" data-toggle="collapse" role="button" class="btn btn-primary">Generar cita</button>
        </div>
        <div id="respuesta"></div>
            <!--Formulario para generar las citas -->
            <div class="collapse container p-4" id="MyCollapse">
            <form id="formulario" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="font-weight-bolder font-italic">Nombre del Paciente</label>
                    <input type="text" class="form-control" id="nombre" name="nombreP" placeholder="Ej: Andres" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label class="font-weight-bolder font-italic">Apellido del Paciente</label>
                    <input type="text" class="form-control" id="apellido" name="apellidoP" placeholder="Ej: Zapata" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="font-weight-bolder font-italic">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Mencione el asunto de la cita" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label class="font-weight-bolder font-italic">Fecha para la cita</label>
                    <input type="date" id="fecha" class="form-control" name="fecha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="font-weight-bolder font-italic">Seleccione el tipo de cita medica</label>
                    <select id="tipoCita" name="tipoCita" class="form-control">
                        <option value="0" selected>Tipo de cita</option>
                        <option value="1">Medico General</option>
                        <option value="2">Oftalmología</option>
                        <option value="5">Odontologia</option>
                        <option value="6">Dermatología</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6" id="medico">
                    </div>
                </div>
                <button type="submit" id="enviar" class="btn btn-success btn-lg">Generar</button>
                </form>
            </div>
     </div>
    </div>
    <!-- Tabla con la informacion de las citas -->
    <div class="container">
    <button href="#MyCollaps" data-toggle="collapse" role="button" class="btn btn-warning text-light m-4">Listado de citas</button>
    <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
    <table
     class="table table-bordered table-striped table-sm mb-0 table-primary collapse container" id="MyCollaps">
        <thead>
            <th>Nombre del paciente</th>
            <th>Apellido del paciente</th>
            <th>Asusnto de la cita</th>
            <th>Fecha de la cita</th>
            <th>Tipo de la cita</th>
            <th>Medico asignado</th>
        </thead>
        <tbody>
        <?php 
        $sql = "SELECT R.NOMBRE_PAC, R.APELLIDO_PAC, R.ASUNTO, R.FECHA_CITA, M.NOMBRE_MED, C.NOMBRE_CATEGORIA FROM
                reservacion R INNER JOIN medicos M ON R.MEDICO_ID = M.ID_MEDICO 
                INNER JOIN categoria C ON M.CATEGORIA_ID = C.ID_CATEGORIA ORDER BY FECHA_CITA";
        $result = mysqli_query($conexion, $sql);
            while($mostrar = mysqli_fetch_array($result)){
                ?>
            
            <tr>
                <td><?php echo $mostrar['NOMBRE_PAC']?></td>
                <td><?php echo $mostrar['APELLIDO_PAC']?></td>
                <td><?php echo $mostrar['ASUNTO']?></td>
                <td><?php echo $mostrar['FECHA_CITA']?></td>
                <td><?php echo $mostrar['NOMBRE_CATEGORIA']?></td>
                <td><?php echo $mostrar['NOMBRE_MED']?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>

    <footer>
    <div class="content">
    <div class="logo">
    <ul class="iconos">
            <li><i class="fa fa-facebook fa-lg"></i></li>
            <li><i class="fa fa-instagram fa-lg"></i></li>
            <li><i class="fa fa-twitter fa-lg"></i></li>
    </ul>
    <p class="copy text-light font-italic">&copy; 2020 ADSI SENA - PEDREGAL<p> 
    </div>
    </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
</body>
</html>
<script type="text/javascript">
        $(document).ready(function(){
            $('#tipoCita').val(0);
            cargarDoc();

            $('#tipoCita').change(function(){
                cargarDoc();
            });
        })
    </script>

    <script type="text/javascript">
        function cargarDoc(){
            $.ajax({
                type:"POST",
                url:"Controlador/data.php",
                data: "categoria=" + $('#tipoCita').val(),
                success:function(r){
                    $('#medico').html(r);
                }
            });
        }
    </script>
    <!-- script para el envio de los datos del formulario -->
    <script>
        $('#enviar').click(function(){
            var datos = $('#formulario').serialize();
            $.ajax({
                url: 'Controlador/registrarCita.php',
                type: 'POST',
                data: datos,
                success: function(res){
                    $('#respuesta').html(res);
                    $("#formulario")[0].reset();
                }
            });
            return false;
        });

    </script>