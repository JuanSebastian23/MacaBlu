<?php 
include_once"db.ecommerce.php";
$conn = mysqli_connect($host,$user,$pass,$db);
?>
<?php
$query = "SELECT p.Id_Productos, p.Nombre_P, p.Precio, p.Existencia, c.Nombre_C, pr.Nombre, p.Descripcion, p.imagen
            FROM productos p
            JOIN categoria c ON p.Id_Categoria = c.Id_Categoria
            JOIN proveedor pr ON p.Id_Proveedor = pr.Id_Proveedor";
            $result = mysqli_query($conn, $query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Modal</title>
    <!-- Incluye Bootstrap CSS desde la CDN oficial -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye Font Awesome para los iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
            } 
        ?>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">
                    <i class="fa-solid fa-plus"></i> Nuevo registro
                </a>
            </div>
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Existencia</th>
                    <th>Precio</th>
                    <th>Poster</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['Id_Productos']; ?></td>
                        <td><?= $row['Nombre_P']; ?></td>
                        <td><?= $row['Descripcion']; ?></td>
                        <td><?= $row['Nombre_C']; ?></td>
                        <td><?= $row['Existencia']; ?></td>
                        <td><?= number_format($row['Precio'], 2, ',', '.'); ?></td>
                        <td>
                        <?php if (!empty($row['imagen'])): ?>
                            <img src=<?= htmlspecialchars($row['imagen']); ?>" width="100" height="100" alt="Imagen del producto">
                        <?php else: ?>
                            <span>No hay imagen</span>
                        <?php endif; ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['Id_Productos']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>

                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row['Id_Productos']; ?>"><i class="fa-solid fa-trash"></i></i> Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
        $resultC = mysqli_query($conn, "SELECT * FROM categoria");
    ?>

<?php
        $resultP = mysqli_query($conn, "SELECT * FROM proveedor");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoModalLabel">Nuevo Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <form action="guarda.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Existencia" class="form-label">Existencia</label>
                            <textarea class="form-control" name="Existencia" id="Existencia" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <select name="id_proveedor" class="form-control" required>
                            <?php if (!empty($row['imagen'])): ?>
                                <img src="images/<?= htmlspecialchars($row['imagen']); ?>" width="100" height="100" alt="Imagen del producto">
                            <?php else: ?>
                                <span>No hay imagen</span>
                            <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select name="id_categoria" class="form-control" required="required">
                                <!-- Aquí se generan las categorías desde PHP -->
                                <?php foreach($resultC as $categorias): ?>
                                    <option value="<?php echo $categorias['Id_Categoria']; ?>"><?php echo $categorias['Nombre_C']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" name="precio" class="form-control" id="precio" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Selecciona una imagen (JPG o PNG):</label>
                            <input type="file" name="image" id="file" accept="image/png, image/jpeg" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>

    <!-- Incluye Bootstrap JS y Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>