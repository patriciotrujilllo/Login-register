<?php
include("../conexion/conexion_db.php");
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

        try {
            $stmt = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email limit 1');
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row =  $stmt->fetch(PDO::FETCH_ASSOC);
                $password_bd = $row['password'];
                if (password_verify($password, $password_bd)) {
                    return $email;
                    exit;
                } else {
                    return false;
                    exit;
                }
                exit;
            } else {
                return false;
                exit;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function userRegister($email, $password)
    {
        global $conexion;
        $password = password_hash($password, PASSWORD_DEFAULT);
        try {

            $stmt = $conexion->prepare('SELECT * from usuarios where email= :email');
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return false;
                exit;
            } else {
                $stmt = $conexion->prepare('INSERT into usuarios(email,password) values(:email, :password)');
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    return true;
                    exit;
                } else {
                    return false;
                    exit;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
