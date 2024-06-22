<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
</head>
<body class="loggedin">
    <nav class="navtop">
        <h1>Sistema de Login Básico ConfiguroWeb</h1>
        <a href="perfil.php"><i class="fas fa-user-circle"></i> Información de Usuario</a>
        <a href="cerrar-sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </nav>
    <div class="content">
        <h2>Página de Inicio</h2>
        <div class="profile-info">
            <img src="https://pbs.twimg.com/profile_images/1179152473266819072/rryC9jBA_400x400.jpg" alt="Foto de perfil">
            <div>
                <p>Hola de nuevo, <?= htmlspecialchars($_SESSION['name']) ?> !!!</p>
                <p>Esta es tu página de inicio. Aquí puedes encontrar información relevante sobre tu cuenta y actividades recientes.</p>
            </div>
        </div>
        <p>Asegúrate de mantener tu información actualizada para disfrutar de una mejor experiencia.</p>
    </div>
</body>
</html>



