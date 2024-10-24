document.getElementById('actualizar').addEventListener('click', function() {
    fetch('../../controlers/controlerscvs/actualizarTemp.php', {  // Enviamos la solicitud al servidor
        method: 'POST',
    })
    .then(response => response.json())  // Convertimos la respuesta a JSON
    .then(data => {
        if(data.success) {
            document.getElementById('mensaje').textContent = "Archivo temporal actualizado correctamente.";
        } else {
            document.getElementById('mensaje').textContent = "Error al actualizar el archivo.";
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('mensaje').textContent = "Error al realizar la solicitud.";
    });
});