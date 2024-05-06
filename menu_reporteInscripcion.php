<?php

session_start();

require_once('clases/grado.php');
require_once('clases/inscripcion.php');
require_once('clases/cupo.php');

$grado = new Grado;
$inscripcion = new Inscripcion;
$cupo = new Cupo;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte Equipo Directivo</title>
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
            <button class="opciones">Perfil: Equipo Directivo</button>
            <a href="cerrar_sesion.php" class="back_btn">Salir</a>
        </div>
        <div class="row" style="height: 20px;"></div>
        <div class="rowComprobante">
            <p class="mail"><strong>Reporte enviado al final del dia a: </strong> equipo.directivo@terciariourquiza.com.ar</p>
            <div class="comprobante">
                <div class="header">
                    <img src="assets/image/logo.png" int="Logo Urquiza" class="logo_header">
                    <h2 class="comp">Reporte diario de Inscripciones</h2>
                </div>

                <?php
                $cantCarrera = $inscripcion->getCantInsciptos();
                $cantGrado = $grado->getCantInsGrado();
                $cantCupo = $cupo->getCuposDisponibles();
                ?>

                <div class="datos">
                    <h3 class="tit_h3"><strong>Cantidad de inscriptos por Carrera</strong></h3>
                    <table>
                        <tbody>
                            <?php
                            foreach ($cantCarrera as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['Carrera'] . "</td>";
                                echo "<td>" . $row['CantidadInscriptos'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <h3 class="tit_h3"><strong>Cantidad de inscriptos por Grado</strong></h3>
                    <table>
                        <tbody>
                            <?php
                            foreach ($cantGrado as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['Detalle'] . "</td>";
                                echo "<td>" . $row['CantidadInscriptos'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <h3 class="tit_h3"><strong>Cantidad de cupos disponibles</strong></h3>
                    <table>
                        <tbody>
                            <?php
                            foreach ($cantCupo as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['Carrera'] . "</td>";
                                echo "<td>" . $row['CupoDisp'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>