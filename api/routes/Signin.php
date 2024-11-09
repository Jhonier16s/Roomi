<?php
require_once '../controllers/SigninController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;


    if ($email && $password) {
        $SigninController = new SigninController();
        $result = $SigninController->login($email, $password);

        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}

?>