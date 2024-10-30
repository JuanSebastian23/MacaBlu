<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gestión de Usuarios</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se llenarán los datos de los usuarios -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Añadir/Editar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form id="userForm">
                            <div class="form-group">
                                <label for="userName">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="userName" placeholder="Ingrese nombre" pattern="[A-Za-z]+" required>
                            </div>
                            <div class="form-group">
                                <label for="userLastName">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="userLastName" placeholder="Ingrese apellido" pattern="[A-Za-z]+" required>
                            </div>
                            <div class="form-group">
                                <label for="userEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="userEmail" placeholder="Ingrese email" required>
                            </div>
                            <div class="form-group">
                                <label for="userPassword">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="userPassword" placeholder="Ingrese contraseña" minlength="8">
                            </div>
                            <div class="form-group">
                                <label for="userRole">Rol</label>
                                <select name="rol" class="form-control" id="userRole" required>
                                    <option value="">Seleccione un rol</option>
                                    <option>Admin</option>
                                    <option>Empleado</option>
                                    <option>Cliente</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>