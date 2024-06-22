<?php
session_start();

// Credenciales de acceso a la base de datos
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login';

// Conexión a la base de datos
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Fallo en la conexión de MySQL: ' . mysqli_connect_error());
}

// Validar si se ha enviado información
if (!isset($_POST['username'], $_POST['password'])) {
    // Si no hay datos, muestra error y redirecciona
    exit('Por favor, complete ambos campos.');
}

// Evitar inyección SQL
if ($stmt = $conexion->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // Parámetros de enlace
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe en la base de datos
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        
        // Verificar la contraseña
        if ($_POST['password'] === $password) {
            // La conexión es exitosa, se crea la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: inicio.php');
        } else {
            // Contraseña incorrecta
            echo 'Usuario o contraseña incorrectos.';
        }
    } else {
        // Usuario incorrecto
        echo 'Usuario o contraseña incorrectos.';
    }
    $stmt->close();
} else {
    echo 'No se pudo preparar la consulta SQL.';
}
?>
