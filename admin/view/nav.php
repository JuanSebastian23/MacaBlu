

<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
            <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Inicio</a> </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                        See All Notifications
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="./Adminlte/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline">
                        <?php
                            echo isset($_SESSION['user_name']) && isset($_SESSION['user_lastname']) 
                                ? htmlspecialchars($_SESSION['user_name'] . ' ' . $_SESSION['user_lastname']) 
                                : 'Usuario';
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                    <li class="user-body">
                        <a href="profile.php" class="dropdown-item">Perfil</a>
                        <a href="./controller/cerrar-sesion.php" class="dropdown-item">Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
