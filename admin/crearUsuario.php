<?php
if (isset($_REQUEST['guardar'])) {
    include_once "db.ecommerce.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $passw = mysqli_real_escape_string($con, $_REQUEST['passw'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
    $direccion = mysqli_real_escape_string($con, $_REQUEST['direccion'] ?? '');
    $rol = mysqli_real_escape_string($con, $_REQUEST['rol'] ?? '');
    $query = "INSERT INTO usarios 
        (Email       ,Passw       ,Nombre, Telefono, Direccion, Id_Rol) VALUES
        ('" . $email . "','" . $passw . "','" . $nombre . "','" . $telefono . "','" . $direccion . "','" . $rol . "');
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuarios</h1>
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
            <form action="panel.php?modulo=crearUsuario" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="passw" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                  <label for="telefono">Teléfono</label>
                                  <input type="tel" id="telefono" name="telefono" class="form-control" 
                                        maxlength="10" pattern="\d{10}" required="required" 
                                        title="Ingrese un número de teléfono de 10 dígitos">
                              </div>
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" name="direccion" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                            <label>Rol</label>
                            <select name="rol" class="form-control" required="required">
                                <option value="1">Administrador</option>
                                <option value="2">Empleado</option>
                                <option value="3">Cliente</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
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