<?php
include_once "db.ecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {
    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $passw = mysqli_real_escape_string($con, $_REQUEST['passw'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
    $direccion = mysqli_real_escape_string($con, $_REQUEST['direccion'] ?? '');
    $rol = mysqli_real_escape_string($con, $_REQUEST['rol'] ?? '');
    $Id_Usuario = mysqli_real_escape_string($con, $_REQUEST['Id_Usuario'] ?? '');
    $query = "UPDATE usarios SET
        Email = '" . $email . "',Passw ='" . $passw . "',Nombre= '" . $nombre . "',Telefono = '".$telefono."', Direccion = '".$direccion."', Id_Rol = '".$rol."' where Id_Usuario = '".$Id_Usuario."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
      
      echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$Id_Usuario = mysqli_real_escape_string($con,$_REQUEST['Id_Usuario'] ?? '');
$query = "SELECT Id_Usuario,Email,Passw,Nombre,Telefono,Direccion,Id_Rol FROM usarios WHERE Id_Usuario = '".$Id_Usuario."'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuarios</h1>
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
            <form action="panel.php?modulo=editarUsuario" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row ['Email']?>" required ="required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="passw" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $row ['Nombre']?>" required ="required">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $row ['Telefono']?>"
                                      maxlength="10" pattern="\d{10}" required="required" 
                                      title="Ingrese un número de teléfono de 10 dígitos">
                            </div>
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $row ['Direccion']?>" required ="required">
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
                                <input type="hidden" name="Id_Usuario" value="<?php echo $row ['Id_Usuario']?>">
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