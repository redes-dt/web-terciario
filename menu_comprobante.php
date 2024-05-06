<?php

session_start();

require_once('clases/alumno.php');
require_once('clases/inscripcion.php');

$alumno = new Alumno;
$inscripcion = new Inscripcion;

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
            <button class="opciones">Inscripción UC</button>
            <button class="opciones">Inscripción Exámen</button>
            <button class="opciones">Trámites</button>
            <button class="opciones">Calendario</button>
            <button class="opciones">Perfil:
                <?php echo $alumno->Nombre; ?>
            </button>
            <a href="cerrar_sesion.php" class="back_btn">Salir</a>
        </div>
        <div class="row" style="height: 20px;"></div>
        <div class="rowComprobante">
            <p class="mail"><strong>Comprobante enviado a: </strong><?php echo $alumno->Email; ?></p>
            <div class="comprobante">
                <div class="header">
                    <img src="assets/image/logo.png" int="Logo Urquiza" class="logo_header">
                    <h2 class="comp">Comprobante de Inscripción</h2>
                </div>

                <?php
                $inscripcion->getDatosInscripcion($alumno->Id_Alumno);
                ?>

                <div class="datos">
                    <p><strong>Nombre y Apellido:</strong> <?php echo $inscripcion->Nombre . " " . $inscripcion->Apellido; ?></p>
                    <p><strong>Fecha y Hora:</strong> <?php echo $inscripcion->FechaHora; ?></p>
                    <p><strong>Carrera:</strong> <?php echo $inscripcion->Carrera; ?></p>
                    <p><strong>Grado:</strong> <?php echo $inscripcion->Detalle; ?></p>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Unidades Curriculares</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $UCs = $inscripcion->getUCInscripcion($alumno->Id_Alumno);
                        foreach ($UCs as $row) {
                            echo "<tr><td>" . $row['Unidad_Curricular'] . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="menu_user.php" class="btnIndex">Volver</a>
        </div>
    </div>
    </div>
</body>

</html>