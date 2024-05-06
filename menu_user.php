<?php

session_start();

require_once('clases/alumno.php');
require_once('clases/unidadCurricular.php');
require_once('clases/grado.php');
require_once('clases/inscripcion.php');
require_once('clases/carrera.php');

$alumno = new Alumno;
$uc = new UnidadCurricular;
$grado = new Grado;
$inscripcion = new Inscripcion;
$carrera = new Carrera;

if (isset($_SESSION['usuarioingresado'])) {
    $alumnoIngresado = $_SESSION['usuarioingresado'];
    $alumno->get($alumnoIngresado);
} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Alumno</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="menu">
    <div>
        <header>
            <div class="button-h">
                <img src="assets/image/button-h.png" int="menu" class="button-h">
            </div>
            <div class="perfil">
                <img src="assets/image/messi.png" int="Logo Perfil" class="perfil">
            </div>
            <div class="title-header">
                <p>SUP. URQUIZA N° 49</p>
            </div>
            <div class="logo_header">
                <img src="assets/image/logo.png" int="Logo Urquiza" class="logo_header">
            </div>
        </header>
        <div class="row" style="height: 20px;"></div>
        <div class="row" style="width: 95%;display: flex;">
            <button class="opciones" onclick="mostrar()">Inscripción UC</button>
            <button class="opciones">Inscripción Exámen</button>
            <button class="opciones">Trámites</button>
            <button class="opciones">Calendario</button>
            <button class="opciones">Perfil:
                <?php echo $alumno->Nombre; ?>
            </button>
            <a href="cerrar_sesion.php" class="back_btn">Salir</a>
        </div>
        <div class="row">
            <div class="column">
                <img src="assets/image/af-blur.png" alt="Logo carrera" class="logoCarrera">
            </div>
            <div class="column" style="background-color:white;">
                <img src="assets/image/ds.png" alt="Logo carrera" class="logoCarrera">
            </div>
            <div class="column">
                <img src="assets/image/iti-blur.png" alt="Logo carrera" class="logoCarrera">
            </div>
        </div>
        <div class="row" style="height: 20px;"></div>
        <div class="rowMateria">
            <form method="post">
                <div class="columnMaterias" id="lista">
                    <h2>Unidades Curriculares</h2>
                    <ul class="list">
                        <?php
                        $carrera->getCarreraAlum($alumno->Id_Alumno);
                        $UCs = $uc->mostrarUC($carrera->Id_Carrera, $alumno->Id_Alumno);
                        foreach ($UCs as $row) {
                            echo "<li><input type='checkbox' name='checkboxes[]' class='mi-checkbox' value='" . $row['Id_UC'] . "'>" . $row['Unidad_Curricular'] . "</li>";
                        }
                        ?>
                        <li>
                            <input type="checkbox" name="seleccion_todos" id="select-all">
                            <label for="select-all">SELECCIONAR TODAS</label>
                        </li>
                    </ul>
                    <input type="submit" value="Enviar" class="btnIndex" name="btnenviar">
                </div>
                <div class="column">
                    <img src="assets/image/DS-horario.png" alt="Logo carrera" class="horarios">
                </div>
            </form>
        </div>
        <div class="columnText" style="background-color: rgba(129, 143, 160, 0.5); border: 2px solid grey">
            <h2 class="ingresantes">INGRESANTES</h2>
            <p>El formulario de PRE-INSCRIPCION A PRIMER AÑO PARA EL CICLO 2024 estará publicado durante el período
                que va del día 20/11/2023 al día 15/12/2023. Después de esa fecha no se podrán registrar
                inscripciones, sin excepción.
            <p>En todas las carreras en que la cantidad de inscriptos supere el cupo disponible, las vacantes serán
                sometidas a un sorteo sin fecha determinada todavía. Como no conocemos aún la cantidad de
                aspirantes, no podemos determinar la modalidad de sorteo, que se consensuará oportunamente con las
                autoridades correspondientes.</p>
            <p>SI la carrera en la que te pre-inscribiste las vacantes no van a sorteo se te informará por este
                medio la forma de presentar la documentación. En cambio, si se requiere sorteo, en esta web se
                informará la modalidad del mismo y los pasos a seguir para los aspirantes.</p>
        </div>
        <div class="column"></div>
    </div>

    <script>
        function mostrar() {
            document.getElementById('lista').style.visibility = "visible";
        };

        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.mi-checkbox');

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('select-all').checked;
            });
        });

        var miCheckboxes = document.querySelectorAll('.mi-checkbox');
        miCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var selectAllCheckbox = document.getElementById('select-all');
                selectAllCheckbox.checked = Array.from(miCheckboxes).every(function(cb) {
                    return cb.checked;
                });
            });
        });
    </script>
</body>

</html>

<?php

if (isset($_POST['btnenviar'])) {
    $checkboxes = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
    if (!empty($checkboxes)) {
        $grado->getGradoCarrera($alumno->Id_Alumno);
        $inscripcion->set($alumno->Id_Alumno, $carrera->Id_Carrera, $grado->Grado);
        foreach ($checkboxes as $row) {
            $inscripcion->cargaUC($alumno->Id_Alumno, $row);
        }
        echo "<script>window.location.href='menu_comprobante.php';</script>";
    } else {
        echo "<script> alert('No se ha seleccionado ninguna unidad curricular')</script>";
    }
}

?>