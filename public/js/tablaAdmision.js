// Obtener elementos del DOM
const tipoUsuarioSelect = document.getElementById('etd');
const filasTabla = document.querySelectorAll('#tableAdmision tbody tr');

// Función para filtrar filas de la tabla
function filtrarTabla() {
    const tipoSeleccionado = tipoUsuarioSelect.value;

    filasTabla.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; // Muestra la fila
        } else {
            fila.style.display = 'none'; // Oculta la fila
        }
    });
}

// Agregar evento al cambiar la opción del select
tipoUsuarioSelect.addEventListener('change', filtrarTabla);

// Filtrar al cargar la página
filtrarTabla();


// Función para filtrar la tabla según la entrada de búsqueda
// function buscador() {
//     // Obtener el valor de búsqueda y convertirlo a minúsculas
//     var input = document.getElementById('searchInput');
//     var filter = input.value.toLowerCase().trim(); // Remover espacios en blanco al inicio y final
//     var table = document.getElementById('tableAdmision');
//     var tr = table.getElementsByTagName('tr');

//     // Recorrer todas las filas de la tabla, excepto la cabecera
//     for (var i = 1; i < tr.length; i++) {
//         var tdCedula = tr[i].getElementsByTagName('td')[1];
//         var tdNombre = tr[i].getElementsByTagName('td')[2];
//         var tdPrograma = tr[i].getElementsByTagName('td')[3];
//         var tdCodigo = tr[i].getElementsByTagName('td')[4];

//         if (tdNombre || tdCedula || tdPrograma || tdCodigo) {
//             // Obtener el texto de las celdas y convertirlo a minúsculas
//             var txtNombre = tdNombre.textContent.toLowerCase();
//             var txtCedula = tdCedula.textContent;
//             var txtPrograma = tdPrograma.textContent.toLowerCase();
//             var txtCodigo = tdCodigo.textContent;

//             // Dividir el nombre completo en palabras (nombre y apellidos)
//             var partesNombre = txtNombre.split(' ');
//             // var partesPrograma = txtNombre.split(' ');

//             // Verificar si la búsqueda coincide con alguna parte del nombre o con la cédula
//             var coincide = partesNombre.some(parte => parte.startsWith(filter)) || 
//                            txtNombre.includes(filter) || 
//                            txtCedula.includes(filter) || 
//                            txtPrograma.includes(filter) || 
//                            txtCodigo.includes(filter);

//             // Mostrar la fila si coincide con algún criterio, de lo contrario, ocultar
//             tr[i].style.display = coincide ? '' : 'none';
//         }
//     }
// }
// buscador()


function buscador() {
    // Obtener el valor de búsqueda y convertirlo a minúsculas
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); // Remover espacios en blanco al inicio y final
    var table = document.getElementById('tableAdmision');
    var tr = table.getElementsByTagName('tr');

    // Recorrer todas las filas de la tabla, excepto la cabecera
    for (var i = 0; i < tr.length; i++) {
        
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        var tdNombre = tr[i].getElementsByTagName('td')[2];
        var tdPrograma = tr[i].getElementsByTagName('td')[3];
        var tdCorreo = tr[i].getElementsByTagName('td')[7];
        var tdCodigo = tr[i].getElementsByTagName('td')[6];

        if (tdNombre || tdCedula || tdPrograma || tdCodigo || tdCorreo) {
            // Obtener el texto de las celdas y convertirlo a minúsculas
            var txtNombre = tdNombre.textContent.toLowerCase();
            var txtCedula = tdCedula.textContent;
            var txtPrograma = tdPrograma.textContent.toLowerCase();
            var txtCodigo = tdCodigo.textContent;
            var txtCorreo = tdCorreo.textContent.toLowerCase();

            // Dividir el nombre completo en palabras (nombre y apellidos)
            var partesNombre = txtNombre.split(' ');
            // var partesPrograma = txtNombre.split(' ');

            // Verificar si la búsqueda coincide con alguna parte del nombre o con la cédula
            var coincide = partesNombre.some(parte => parte.startsWith(filter)) || 
                           txtNombre.includes(filter) || 
                           txtCedula.includes(filter) || 
                           txtPrograma.includes(filter) || 
                           txtCodigo.includes(filter) || 
                           txtCorreo.includes(filter);

            // Mostrar la fila si coincide con algún criterio, de lo contrario, ocultar
            tr[i].style.display = coincide ? '' : 'none';
        }
    }
}
buscador()