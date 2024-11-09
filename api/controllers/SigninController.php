<?php
require_once '../models/UserModel.php';

class SigninController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($email, $password) {
        $user = $this->userModel->findUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['contraseña'])) {
                return ['success' => true, 'message' => 'Inicio de sesión exitoso.'];
            } else {
                return ['success' => false, 'message' => 'Contraseña incorrecta.'];
            }
        } else {
            return ['success' => false, 'message' => 'Usuario no encontrado.'];
        }
    }
}

?>