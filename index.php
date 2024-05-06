<?php

session_start();

require_once('clases/alumno.php');

if (isset($_SESSION['usuarioingresado'])) {
  header('location: menu_user.php');
}

?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Terciario Login</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="index1">
  <h2>Esc. Superior N.º 49 “Cap. Gral. J.J. Urquiza"</h2>
  <div class="caja1">
    <form method="post">
      <div class="formtlo">
        <img src="assets/image/logo.png" alt="Logo Urquiza" class="logo1">
      </div>
      <div class="divSombra">
        <div>
          <input type="text" name="txtdni" placeholder="&#128273; DNI">
          <input type="password" name="txtpassword" id="txtpassword" placeholder="&#128274; Contraseña">
        </div>
        <div class="checkbox1">
          <input type="checkbox" onclick="verpassword()"> Mostrar contraseña
        </div>
      </div>

      <div align="center">
        <input type="submit" value="Ingresar" class="btnIndex" name="btningresar">
        <a href="alumno_registrar.php" class="btnIndex">Registrar</a>
      </div>
    </form>
  </div>

</body>

<script>
  function verpassword() {
    var tipo = document.getElementById("txtpassword");
    tipo.type = (tipo.type === "password") ? "text" : "password";
  }
</script>

</html>

<?php

$alumno = new Alumno();

if (isset($_POST['btningresar'])) {
  $DNI = $_POST["txtdni"];
  $pass = $_POST["txtpassword"];

  $alumno->get($DNI);

  if ($alumno->verificarPassword($pass)) {
    $_SESSION['usuarioingresado'] = $DNI;
    header("Location: menu_user.php");
  } else {
    echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'index.php' </script>";
  }
}

?>