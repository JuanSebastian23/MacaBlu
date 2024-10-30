<?php
include_once __DIR__ . '/../model/conexion.php';

// Configurar cabeceras para JSON
header('Content-Type: application/json');

// Obtener lista de usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['id'])) {
    try {
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    exit();
}

// Obtener usuario por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($user ?: ["status" => "error", "message" => "Usuario no encontrado"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    exit();
}

// Agregar o editar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];

        // Almacena la contraseña directamente sin encriptar
        $password = !empty($_POST['password']) ? $_POST['password'] : null;

        if ($id) {
            // Editar usuario
            if ($password) {
                $stmt = $conn->prepare("UPDATE users SET nombre=:nombre, apellido=:apellido, email=:email, rol=:rol, password=:password WHERE id=:id");
                $stmt->bindParam(':password', $password);
            } else {
                $stmt = $conn->prepare("UPDATE users SET nombre=:nombre, apellido=:apellido, email=:email, rol=:rol WHERE id=:id");
            }
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            // Agregar nuevo usuario
            $stmt = $conn->prepare("INSERT INTO users (nombre, apellido, email, password, rol) VALUES (:nombre, :apellido, :email, :password, :rol)");
            $stmt->bindParam(':password', $password);
        }

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rol', $rol);
        
        $stmt->execute();
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    exit();
}

// Eliminar usuario
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        parse_str(file_get_contents("php://input"), $data);
        $id = $data['id'];

        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    exit();
}
?>
