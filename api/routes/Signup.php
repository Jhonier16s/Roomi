<?php
require_once '../controllers/SignupController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;


    if ($name && $email && $password) {
        $authController = new AuthController();
        $result = $authController->register($name, $email, $password);

        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}

?>