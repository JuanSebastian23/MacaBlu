<?php
// Incluir el archivo de conexión a la base de datos
require 'db.ecommerce.php';

try {
    // Conexión a la base de datos usando los parámetros de db.ecomerse.php
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $id_proveedor = $_POST['id_proveedor'];
    $id_categoria = $_POST['id_categoria'];
    $precio = $_POST['precio'];

    // Verificar si se ha subido un archivo
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/"; // Cambia a tu carpeta preferida
        $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $imageFileType; // Nombre único para la imagen
        $target_file = $target_dir . $newFileName;

        // Verificar si el archivo es una imagen válida
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            echo "El archivo no es una imagen.";
            exit();
        }

        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO productos (Nombre_p, Precio, Id_Categoria, Id_Proveedor, imagen) 
            VALUES (:nombre, :precio, :id_categoria, :id_proveedor, :imagen)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':id_categoria', $id_categoria);
                $stmt->bindParam(':id_proveedor', $id_proveedor);  // Añadir el proveedor
                $stmt->bindParam(':imagen', $target_file);

            if ($stmt->execute()) {
                echo "Producto agregado exitosamente.";
            } else {
                echo "Hubo un error al guardar el producto.";
            }
        } else {
            echo "Hubo un error al subir la imagen.";
        }
    }
}
?>
