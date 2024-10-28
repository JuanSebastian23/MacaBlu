<?php 
include_once"db.ecommerce.php";
$conn = mysqli_connect($host,$user,$pass,$db);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
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
              <table id="tablaProductos" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>categoria</th>
                  <th>Proveedor</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT p.Id_Productos, p.Nombre_P, p.Precio, p.Existencia, c.Nombre_C, pr.Nombre
                FROM productos p
                JOIN categoria c ON p.Id_Categoria = c.Id_Categoria
                JOIN proveedor pr ON p.Id_Proveedor = pr.Id_Proveedor";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                <tr>
                    <td><?php echo $row['Nombre_C']?></td>
                    <td><?php echo $row['Nombre']?></td>
                  <td><?php echo $row['Nombre_P']?></td>
                  <td><?php echo $row['Precio']?></td>
                  <td><?php echo $row['Existencia']?></td>
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