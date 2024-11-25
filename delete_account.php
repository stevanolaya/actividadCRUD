<!-- delete_account.php -->
<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once 'config.php';

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Eliminar el usuario de la base de datos
$query = "DELETE FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    echo "Hubo un error al eliminar la cuenta. Intenta de nuevo.";
}
?>
