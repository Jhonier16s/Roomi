<?php
require_once '../models/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($name, $email, $password) {
        
        if ($this->userModel->findUserByEmail($email)) {
            return ['success' => false, 'message' => 'El usuario ya existe.'];
        }

        
        if ($this->userModel->createUser($name, $email, $password)) {
            return ['success' => true, 'message' => 'Usuario registrado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al registrar el usuario.'];
        }
    }
}

?>