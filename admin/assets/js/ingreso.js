document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    try {
        const response = await fetch('controller/ingreso.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Bienvenido',
                text: result.message,
                confirmButtonText: 'Continuar'
            }).then(() => {
                window.location.href = 'index.php';  // Redirige al dashboard
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: result.message
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema con el servidor. Inténtalo de nuevo más tarde.'
        });
        console.error("Error en el inicio de sesión:", error);
    }
});
