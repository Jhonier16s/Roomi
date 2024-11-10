<?php
session_start();  


if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
  
    header("Location: login.php"); 
    exit(); 
}

require_once '../models/UserModel.php';

class DashboardController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function listUsers() {
        
        $users = $this->userModel->listUsers();
        return $users;
    }
}


$DashboardController = new DashboardController();

$users = $DashboardController->listUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Lista de Usuarios</h1>    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($users): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($user['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($user['correo_electronico']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay usuarios disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
