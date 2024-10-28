<?php 
include_once"db.ecommerce.php";
$conn = mysqli_connect($host,$user,$pass,$db);
if (isset($_REQUEST['Id_Borrar'])) {
  $Id_Borrar = mysqli_real_escape_string($conn,$_REQUEST['Id_Borrar']);
  $query = "DELETE FROM usarios WHERE Id_Usuario = '".$Id_Borrar."'";
  $result = mysqli_query($conn,$query);
  if ($result) {
    echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario eliminado exitosamente" />  ';
  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      Error al eliminar usuario <?php echo mysqli_error($conn); ?>
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
            <h1>Usuarios</h1>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Acciones
                    <a href="panel.php?modulo=crearUsuario"><i class ="fas fa-plus" aria-hidden="true"></i></a>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT u.Id_Usuario, u.Email, u.Nombre, u.Telefono, u.Direccion, r.Rol
                            FROM usarios u
                            JOIN roles r ON u.Id_Rol = r.Id_Rol";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                <tr>
                  <td><?php echo $row['Nombre']?></td>
                  <td><?php echo $row['Rol']?></td>
                  <td><?php echo $row['Email']?></td>
                  <td><?php echo $row['Telefono']?></td>
                  <td><?php echo $row['Direccion']?></td>
                  <td>
                    <a href="panel.php?modulo=editarUsuario&Id_Usuario=<?php echo $row['Id_Usuario']?>"style="margin-right: 5px;"></style><i class ="fas fa-edit"></i></a>
                    <a href="panel.php?modulo=usuarios&Id_Borrar=<?php echo $row['Id_Usuario']?>"class="text-danger borrar"><i class ="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                  }
                  ?>
                </tbody>
              </table>
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