<?php
session_start();
if (!empty($_POST["Registrar"])){
    if(!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["nombre"]) and !empty($_POST["apellido"])){
        
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql="select * from usuarios where email='$email'";
        $mail= $conexion->query($sql);
        if ($mail->num_rows > 0){
            echo "<div class='alert alert-danger' role='alert'>
            correo ya existente!
            </div>";
            }  
        
 
        else{
            
            $sql="insert into usuarios(nombre,apellido,email,password) values('$nombre','$apellido','$email','$password')";   
            if($conexion->query($sql)){
                echo "<div class='alert alert-primary' role='alert'>
            Se creo usuario!
            </div>";    
                header("location:login.php");
            }
        }
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>
        Faltaron campor por rellenar!
      </div>";
       // echo $mensaje2;
        
    }
}


?>