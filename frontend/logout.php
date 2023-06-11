<?php

session_start();
session_unset();
session_destroy();
setcookie("token", "", time() - 1, "/");
setcookie("email", "", time() - 1, "/");
header("location:./view/login.php");
