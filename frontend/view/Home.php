<?php
session_start();

if (!isset($_SESSION['token']))
  header("location:./login.php");

if (!isset($_COOKIE['token']))
  header("location:./login.php");

if ($_SESSION['token'] != $_COOKIE['token'])
  header("location:./login.php");

?>
<!DOCTYPE html>
<html>

<head>
  <title>Página de inicio</title>
</head>

<body>
  <h1>Hola <?php echo $_COOKIE["email"] ?></h1>
  <span><a href="../logout.php">Logout</a></span>
</body>

</html>