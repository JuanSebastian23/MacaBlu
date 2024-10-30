// CRUD usuarios
document.addEventListener('DOMContentLoaded', () => {
    const userForm = document.getElementById('userForm');
    const userTableBody = document.querySelector('#userTable tbody');

    const fetchUsers = async () => {
        const response = await fetch('controller/gestion-usuarios.php');
        const users = await response.json();
        userTableBody.innerHTML = users.map(user => `
            <tr>
                <td>${user.id}</td>
                <td>${user.nombre}</td>
                <td>${user.apellido}</td>
                <td>${user.email}</td>
                <td>${user.rol}</td>
                <td class="text-center">
                    <button class="btn btn-info btn-sm mx-1" style="width: 70px;" onclick="editUser(${user.id})">Editar</button>
                    <button class="btn btn-danger btn-sm mx-1" style="width: 70px;" onclick="deleteUser(${user.id})">Eliminar</button>
                </td>
            </tr>
        `).join('');
    };

    userForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(userForm);
        formData.append('id', userForm.dataset.id || ''); // Para actualización
    
        const response = await fetch('controller/gestion-usuarios.php', {
            method: 'POST',
            body: formData
        });
    
        const result = await response.json();
        if (result.status === "success") {
            Swal.fire('Guardado', 'El usuario ha sido guardado correctamente.', 'success');
            userForm.reset();
            userForm.removeAttribute('data-id');
            fetchUsers();
        } else {
            Swal.fire('Error', 'No se pudo guardar el usuario.', 'error');
        }
    });
    

    window.editUser = async (id) => {
        try {
            const response = await fetch(`controller/gestion-usuarios.php?id=${id}`);
            const user = await response.json();
    
            if (user && user.nombre) {
                // Asignar los valores recuperados a los campos del formulario
                document.getElementById('userName').value = user.nombre;
                document.getElementById('userLastName').value = user.apellido;
                document.getElementById('userEmail').value = user.email;
                document.getElementById('userRole').value = user.rol;
    
                // Guardar el ID del usuario en el formulario para indicar que es una edición
                document.getElementById('userForm').dataset.id = user.id;
            } else {
                console.error("Usuario no encontrado o respuesta incorrecta:", user);
            }
        } catch (error) {
            console.error("Error al obtener el usuario:", error);
        }
    };
    

    window.deleteUser = async (id) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const response = await fetch(`controller/gestion-usuarios.php`, {
                    method: 'DELETE',
                    body: `id=${id}`,
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
    
                const result = await response.json();
                if (result.status === "success") {
                    Swal.fire('Eliminado', 'El usuario ha sido eliminado.', 'success');
                    fetchUsers();
                } else {
                    Swal.fire('Error', 'No se pudo eliminar el usuario.', 'error');
                }
            }
        });
    };
    

    fetchUsers();
});

