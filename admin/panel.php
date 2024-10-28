<!DOCTYPE html>
<html lang="es">
<?php
    session_start();
    if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar"){
      session_destroy();
      header("Location: index.php");
    } 
    if( isset($_SESSION['Id_Usuario']) == false ){
      header("Location: index.php");
    }
    $modulo=$_REQUEST['modulo']??'';
    ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <!-- Incluye Bootstrap CSS desde la CDN oficial -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Incluye Font Awesome para los iconos -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Otros estilos -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        
          <a class="nav-link" href="panel.php?modulo=editarUsuario&Id_Usuario=<?php echo $_SESSION['Id_Usuario'];?>">
            <i class="far fa-user"></i>
          </a>

          <a class="nav-link text-danger" href="panel.php?modulo=&sesion=cerrar" title="Cerar sesion">
            <i class="fas fa-door-closed"></i>
          </a>
        
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/MacaBlue.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MacaBlue</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['Nombre']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
                <p>
                  Ecommerce
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="panel.php?modulo=estadisticas" class="nav-link <?php echo ($modulo=="estadisticas" || $modulo=="" )?" active ":" "; ?>">
                    <i class="fas fa-chart-bar  nav-icon  "></i>
                    <p>Estadisticas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=usuarios" class="nav-link <?php echo ($modulo=="usuarios" || $modulo=="crearUsuario" || $modulo=="editarUsuario" )?" active ":" "; ?>">
                    <i class="far fa-user nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=productos" class="nav-link <?php echo ($modulo=="productos" )?" active ":" "; ?>">
                    <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                    <p>Productos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="panel.php?modulo=ventas" class="nav-link <?php echo ($modulo=="ventas" )?" active ":" "; ?>">
                    <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
      if($modulo=="estadisticas" || $modulo==""){
        include_once "estadisticas.php";
      }
      if($modulo=="usuarios"){
        include_once "usuarios.php";
      }
      
      if($modulo=="ventas"){
        include_once "ventas.php";
      }
      if($modulo=="crearUsuario"){
        include_once "crearUsuario.php";
      }
      if($modulo=="editarUsuario"){
        include_once "editarUsuario.php";
      }

      if($modulo=="productos"){
        include_once "indexP.php";
      }
    ?>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- Incluye Bootstrap JS y Popper.js desde la CDN oficial -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <!-- Otros scripts -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="plugins/sparklines/sparkline.js"></script>
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    editor = new $.fn.dataTable.Editor( {
        ajax: "controllers/productos.php",
        table: "#tablaProductos",
        fields: [ {
                label: "Categoria:",
                name: "categoria"
            }, {
                label: "Proveedor:",
                name: "proveedor"
            }, {
                label: "Nombre:",
                name: "nombre"
            },{
                label: "Nombre:",
                name: "nombre"
            },{
                label: "Precio:",
                name: "precio"
            },{
                label: "Existencia:",
                name: "existencia"
            }
        ]
    } );
 
    $('#tablaProductos').DataTable( {
        dom: "Bfrtip",
        ajax: "controllers/productos.php",
        columns: [
            { data: "categoria" },
            { data: "proveedor" },
            { data: "nombre" },
            { data: "precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
            { data: "existencia" },
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
  });
</script>
<script>
  $(document).ready(function () {
    $(".borrar").click(function (e) { 
      e.preventDefault();
      var res=confirm("Realmente quieres borrar este usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
      
    });
  });
</script>
</body>

</html>