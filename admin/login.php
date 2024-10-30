<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Redirige al dashboard si el usuario ya ha iniciado sesión
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macablue | Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./Adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Iniciar Sesión</h2>
                    </div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SweetAlert2 y JavaScript de inicio de sesión -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/ingreso.js"></script>
</body>
</html>