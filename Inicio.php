<?php

session_start();
include './conexion/conexion_db.php';

$email=$_SESSION['email'];
if (!isset($email)){
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Página de inicio</title>
</head>
<body>
  <h1>Bienvenido <?php echo $email; ?> esta es la página de inicio.</h1>
  <span><a href="logout.php">Logout</a></span>
</body>
</html>
