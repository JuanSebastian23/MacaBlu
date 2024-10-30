//Sección de gestión de usuarios
document.getElementById('usuarios-link').addEventListener('click', function() {
    const mainContent = document.querySelector('main.app-main');
    Array.from(mainContent.children).forEach(child => {
        child.style.display = 'none';
    });
    document.getElementById('gestion-usuarios').style.display = 'block';
});


