window.addEventListener('load', function() {
    fetch('get_user.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('user-welcome').innerText = `Bienvenido, ${data}`;
        })
        .catch(error => console.error('Error al obtener el nombre del usuario:', error));
});
