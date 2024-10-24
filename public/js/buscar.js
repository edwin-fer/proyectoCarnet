
function buscador() {
    // Obtener el valor de búsqueda y convertirlo a minúsculas
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); // Remover espacios en blanco al inicio y final
    var table = document.getElementById('tablaUsuarios');
    var tr = table.getElementsByTagName('tr');

    // Recorrer todas las filas de la tabla, excepto la cabecera
    for (var i = 0; i < tr.length; i++) {
        
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        var tdNombre = tr[i].getElementsByTagName('td')[0];
        var tdPrograma = tr[i].getElementsByTagName('td')[2];

        if (tdNombre || tdCedula || tdPrograma) {
            // Obtener el texto de las celdas y convertirlo a minúsculas
            var txtNombre = tdNombre.textContent.toLowerCase();
            var txtCedula = tdCedula.textContent;
            var txtPrograma = tdPrograma.textContent.toLowerCase();

            // Dividir el nombre completo en palabras (nombre y apellidos)
            var partesNombre = txtNombre.split(' ');
            // var partesPrograma = txtNombre.split(' ');

            // Verificar si la búsqueda coincide con alguna parte del nombre o con la cédula
            var coincide = partesNombre.some(parte => parte.startsWith(filter)) || 
                           txtNombre.includes(filter) || 
                           txtCedula.includes(filter) || 
                           txtPrograma.includes(filter);

            // Mostrar la fila si coincide con algún criterio, de lo contrario, ocultar
            tr[i].style.display = coincide ? '' : 'none';
        }
    }
}

buscador()
    