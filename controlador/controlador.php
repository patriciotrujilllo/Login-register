<?php
session_start();

if (!empty($_POST["Ingresar"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Retrieve the hashed password from the database
            $row = $resultado->fetch_assoc();
            $db_password = $row["password"];

            // Verify the password
            echo $password;
            if (password_verify($password, $db_password)) {
                
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                header("location:inicio.php");
            } 
            else {
                echo "<div class='alert alert-danger' role='alert'>
                    La contraseña ingresada no es correcta!
                    </div>";
                    
                    echo $db_password;
            }
        } 
        else {
            echo "<div class='alert alert-danger' role='alert'>
                Usuario o contraseña son incorrectos!
                </div>";
        }
    } 
    else {
        echo "<div class='alert alert-danger' role='alert'>
            Faltaron campos por rellenar!
            </div>";
    }
}
?>