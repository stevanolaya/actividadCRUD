
<?php
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no está logueado
    exit;
}

// Si el usuario está logueado, mostrar el contenido de la página
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link rel="stylesheet" href="stilos.css">
</head>
<body>
    <header>
        <div class="user-info">
            <p>Bienvenido, <?php echo htmlspecialchars($username); ?></p>
            <a href="profile.php" class="btn">Ir a mi perfil</a> <!-- Botón de perfil -->
            <a href="logout.php" class="btn logout">Cerrar sesión</a> <!-- Botón de cerrar sesión -->
        </div>
    </header>
    <div class="slider">
        <!-- Slider de imágenes -->
        <div class="slider-image">
            <img src="imagenes/primera.jpg" alt="imagen 1">
        </div>
        <div class="slider-image"> 
            <img src="imagenes/segunda.jpg" alt="imagen 2">
        </div>
        <div class="slider-image"> 
            <img src="imagenes/tercera.jpg" alt="imagen 3">
        </div>
        <div class="slider-image"> 
            <img src="imagenes/cuarta.jpg" alt="imagen 4">
        </div>
        <div class="slider-image"> 
            <img src="imagenes/quinta.jpg" alt="imagen 5">
        </div>
    </div>
    
    <!-- Filtros de categorías -->
    <div class="filter">
        <input type="radio" name="filter" id="all" checked>
        <label for="all">Todas</label>
    
        <input type="radio" name="filter" id="accion">
        <label for="accion">Acción</label>
    
        <input type="radio" name="filter" id="comedia">
        <label for="comedia">Comedia</label>
    
        <input type="radio" name="filter" id="animada">
        <label for="animada">Animada</label>
    </div>
    
    <!-- Input para buscar películas -->
    <div class="search">
        <input type="text" id="searchInput" placeholder="Buscar película...">
    </div>
    
    <div class="movies">
        <!-- Películas acción -->
        <div class="movie accion">
            <img src="caratulas/Mission_Impossible_Fallout_A.jpeg" alt="Accion1">
            <p>Misión Imposible</p>
        </div>

        <div class="movie accion">
            <img src="caratulas/Soy_Leyenda_A.jpeg" alt="Accion2">
            <p>Soy Leyenda</p>
        </div>

        <div class="movie accion">
            <img src="caratulas/deadpool.jpg" alt="Accion3">
            <p>Deadpool</p>
        </div>

        <!-- Películas comedia -->
        <div class="movie comedia">
            <img src="caratulas/Agente_Secreto_C.jpg" alt="Comedia1">
            <p>Agente Secreto</p>
        </div>

        <div class="movie comedia">
            <img src="caratulas/Free_Guy_C.jpeg" alt="Comedia2">
            <p>Free Guy</p>
        </div>

        <div class="movie comedia">
            <img src="caratulas/Ghost_Busters_C.jpeg" alt="Comedia3">
            <p>Ghost Busters</p>
        </div>

        <!-- Películas animadas -->
        <div class="movie animada">
            <img src="caratulas/Rey_Leon_An.jpg" alt="Animada1">
            <p>Rey León</p>
        </div>
        
        <div class="movie animada">
            <img src="caratulas/Shrek_An.webp" alt="Animada2">
            <p>Shrek</p>
        </div>
        
        <div class="movie animada">
            <img src="caratulas/Toy_Story_An.webp" alt="Animada3">
            <p>Toy Story</p>
        </div>
    </div>

    
    <script src="script.js"></script>
</body>
</html>
