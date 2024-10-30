<?php
session_start();
include_once __DIR__ . '/../model/conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Consulta para verificar las credenciales
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Guardar nombre y apellido en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_lastname'] = $user['apellido'];
        $_SESSION['user_role'] = $user['rol'];

        echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Credenciales incorrectas"]);
    }
    exit();
}
?>
