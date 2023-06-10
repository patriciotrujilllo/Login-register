<?php
include_once("../conexion/conexion_db.php");
class Usuario
{
    private $email;
    private $password;


    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    //CRUD

    public static function userLogin($email, $password)
    {
        global $conexion;
        $stmt = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            //$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            header("location:../../frontend/view/Home.php");
            exit;
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    Error en email/contraseña
                    </div>";
        }
    }


    public function userRegister($email, $password)
    {
        global $conexion;
        try {

            $stmt = $conexion->prepare('SELECT * from usuarios where email= :email');
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='alert alert-danger' role='alert'>
                    email ocupado!
                    </div>";
            } else {
                $stmt = $conexion->prepare('INSERT into usuarios(email,password) values(:email, :password)');
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    header('location:../../frontend/view/login.php');
                    exit;
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                    problema al ingresar nuevo usuario!
                    </div>";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
