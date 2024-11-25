<!-- register.php -->
<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; // Campo de confirmación de contraseña

    // Verificamos que las contraseñas coincidan
    if ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
        // Si las contraseñas coinciden, procesamos el registro
        if (!empty($username) && !empty($password)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ss', $username, $password_hash);

            if ($stmt->execute()) {
                header('Location: login.php'); // Redirigir al login después de registrar
                exit;
            } else {
                $error = "Hubo un problema al registrar el usuario.";
            }
        } else {
            $error = "Por favor, completa todos los campos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="stilos.css">
</head>
<body>
    <div class="register-container">
        <form method="POST" action="register.php">
            <h1>Registrarse</h1>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" required>
            
            <button type="submit">Registrar</button>
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </form>
    </div>
</body>
</html>
