<?php
require_once '../models/UserModel.php';

class DashboardController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function listUsers() {
        try {
            $users = $this->userModel->listUsers();
            return $users;
        } catch (Exception $e) {
            return [];
        }
    }
}

$DashboardController = new DashboardController();
$users = $DashboardController->listUsers();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../../frontend/assets/css/dashboard.css" />
</head>
<body>

    <h1>Clientes</h1>    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Country</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($users): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($user['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($user['celular']); ?></td>
                        <td><?php echo htmlspecialchars($user['correo_electronico']); ?></td>
                        <td><?php echo htmlspecialchars($user['pais']); ?></td>
                        <td>
                            <?php if ($user['status'] == 'Active'): ?>
                                <span class="status-active">Active</span>
                            <?php else: ?>
                                <span class="status-inactive">Inactive</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay usuarios disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
