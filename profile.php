<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        if (!empty($new_username)) {
            $update_query = "UPDATE users SET username = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param('si', $new_username, $user_id);
            $stmt->execute();
            $_SESSION['username'] = $new_username;
        }

        if (!empty($new_password)) {
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password_query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($update_password_query);
            $stmt->bind_param('si', $password_hash, $user_id);
            $stmt->execute();
        }
    }

    if (isset($_POST['delete'])) {
        $delete_query = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="stilos.css">
</head>
<body>
   
    <a href="index.php" class="btn return-btn">Volver al slider</a>
    
    <h1>Bienvenido, <?php echo $username; ?></h1>

    <form method="POST">
        <h2>Actualizar información</h2>
        <label for="new_username">Nuevo usuario:</label>
        <input type="text" name="new_username" placeholder="Nuevo nombre de usuario">
        
        <label for="new_password">Nueva contraseña:</label>
        <input type="password" name="new_password" placeholder="Nueva contraseña">
        
        <button type="submit" name="update" class="btn update-btn">Actualizar</button>
    </form>

    <form method="POST">
        <h2>Eliminar cuenta</h2>
        <button type="submit" name="delete" class="btn delete-btn" onclick="return confirm('¿Estás seguro de eliminar tu cuenta?');">Eliminar cuenta</button>
    </form>

</body>
</html>
