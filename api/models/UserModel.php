<?php
require_once '../config/db.php';

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createUser($name,  $email, $password) {        
        $sql = "INSERT INTO usuario (nombre, contraseña, apellido, correo_electronico, telefono, id_detalle_usuario, id_super_usuario, creado_en, actualizado_en, eliminado_en, estado)
                VALUES (:name, :hashedPassword, '', :email, '3152230513', 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, 'activo')";
        
        $stmt = $this->conn->prepare($sql);
        
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        
        $stmt->bindParam(':name', $name);        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hashedPassword', $hashedPassword);        
        
        return $stmt->execute();
    }

    public function findUserByEmail($email) {
        $sql = "SELECT * FROM usuario WHERE correo_electronico = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>