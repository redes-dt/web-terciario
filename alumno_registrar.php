<?php

session_start();

require_once('clases/alumno.php');
require_once('clases/carrera.php');
require_once('clases/cupo.php');

$carrera = new Carrera();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Alumno</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="index">
<div class="container"> 
    <div class="caja2">
        <form method="post">
            <div class="formtlo">
                <img src="assets/image/logo.png" alt="Logo Urquiza" class="logo2">
                <h2>Registro Alumno</h2>
            </div>

            <div class="divSombra">
                <input type="text" class="div1" name="nombre" placeholder="Nombre" required>
                <input type="text" class="div1" name="apellido" placeholder="Apellido" required>
                <input type="number" class="div1" name="dni" placeholder="DNI" maxlength="10" required>
                <input type="number" class="div1" name="telefono" placeholder="Teléfono" required>
                <input type="password" class="div2" id="pass" name="pass" placeholder="Contraseña" required>
                <input type="email" class="div2" name="email" placeholder="Email" required>
                <div class="checkbox1">
                    <input type="checkbox" onclick="verpassword()">Mostrar contraseña
                </div>
                <div>
                    <label class="label">Genero</label>
                    <select class="select" name="genero" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div>
                    <label class="label">Fecha de Nacimiento</label>
                    <input type="date" class="date" name="fecha_nac" placeholder="Fecha de Nacimiento" required>
                </div>
                <input type="text" class="div2" name="nacionalidad" placeholder="Nacionalidad" required>
                <input type="text" class="div2" name="direccion" placeholder="Dirección" required>
                <input type="text" class="div2" name="localidad" placeholder="Localidad" required>
                <div>
                    <label class="label">Carrera</label>
                    <select name="carrera" placeholder="Carrera" class="selectCarrera" required>
                        <?php $carrera->listarCarreras(); ?>
                    </select>
                </div>
            </div>

            <div align="center">
                <input type="submit" value="Registrar" class="btnIndex" name="btnregistrar">
                <a href="index.php" class="btnIndex">Inicio</a>
            </div>
        </form>
    </div>
</div>
</body>

<script>
    function verpassword() {
        var tipo = document.getElementById("pass");
        tipo.type = (tipo.type === "password") ? "text" : "password";
    }
</script>

</html>

<?php

$alumno = new Alumno();
$cupo = new Cupo();

if (isset($_POST["btnregistrar"])) {

    $DNI = $_POST["dni"];
    $Nombre = ucwords(strtolower($_POST["nombre"]));
    $Apellido = ucwords(strtolower($_POST["apellido"]));
    $Email = $_POST["email"];
    $Telefono = $_POST["telefono"];
    $Pass = $_POST["pass"];
    $Pass_Fuerte = password_hash($Pass, PASSWORD_BCRYPT);
    $Fecha_Nac = $_POST["fecha_nac"];
    $Nacionalidad = $_POST["nacionalidad"];
    $Direccion = $_POST["direccion"];
    $Localidad = $_POST["localidad"];
    $Genero = $_POST["genero"];

    $nuevo_alumno = array(
        'DNI' => $DNI,
        'Nombre' => $Nombre,
        'Apellido' => $Apellido,
        'Email' => $Email,
        'Telefono' => $Telefono,
        'Pass' => $Pass_Fuerte,
        'Fecha_Nac' => $Fecha_Nac,
        'Nacionalidad' => $Nacionalidad,
        'Direccion' => $Direccion,
        'Localidad' => $Localidad,
        'Genero' => $Genero
    );

    $alumno->get($DNI);
    if ($alumno->DNI != $DNI) {
        if ($cupo->validarCupo($_POST["carrera"])) {
            $alumno->set($nuevo_alumno);
            $alumno->asigCarrera($_POST["carrera"], $DNI);
            $alumno->asigGrado($DNI);
            echo "<script> alert('Usuario registrado: $DNI');window.location= 'index.php' </script>";
        } else {
            echo "<script> alert('No se puede registrar por falta de cupos en la carrera seleccionada');window.location= 'index.php' </script>";
        }
    } else {
        echo "<script> alert('No se puede registrar a este usuario porque ya existe: $DNI');window.location= 'index.php' </script>";
    }
}

?>