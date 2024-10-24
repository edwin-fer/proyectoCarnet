// Obtener elementos del DOM
const tipoUsuarioSelectcart = document.getElementById('carnt');
const filasTablacart = document.querySelectorAll('#tableadministrador tbody tr');

// Función para filtrar filas de la tabla
function filtrarTablacart() {
    const tipoSeleccionado = tipoUsuarioSelectcart.value;

    filasTablacart.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; // Muestra la fila
        } else {
            fila.style.display = 'none'; // Oculta la fila
        }
    });
}

// Agregar evento al cambiar la opción del select
tipoUsuarioSelect.addEventListener('change', filtrarTablacart);

// Filtrar al cargar la página
filtrarTablacart();



// Obtener elementos del DOM
const tipoUsuarioSelecttipo = document.getElementById('tipo');
const filasTablatipo = document.querySelectorAll('#tableadministrador tbody tr');

// Función para filtrar filas de la tabla
function filtrarTablatipo() {
    const tipoSeleccionado = tipoUsuarioSelecttipo.value;

    filasTablatipo.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; // Muestra la fila
        } else {
            fila.style.display = 'none'; // Oculta la fila
        }
    });
}

// Agregar evento al cambiar la opción del select
tipoUsuarioSelect.addEventListener('change', filtrarTablatipo);

// Filtrar al cargar la página
filtrarTablatipo();




// Obtener elementos del DOM
const tipoUsuarioSelect = document.getElementById('etd');
const filasTabla = document.querySelectorAll('#tableadministrador tbody tr');
const filtroInput = document.getElementById('filtroInput');

// Función para filtrar filas de la tabla
function filtrarTabla() {
    const tipoSeleccionado = tipoUsuarioSelect.value;
    const textoFiltro = filtroInput.value.toLowerCase();

    filasTabla.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        const nombreUsuario = fila.querySelector('td:first-child').textContent.toLowerCase();

        if ((tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) &&
            (nombreUsuario.includes(textoFiltro))) {
            fila.style.display = ''; // Muestra la fila
        } else {
            fila.style.display = 'none'; // Oculta la fila
        }
    });
}

// Agregar evento al cambiar la opción del select
tipoUsuarioSelect.addEventListener('change', filtrarTabla);

// Agregar evento al escribir en el campo de entrada
filtroInput.addEventListener('input', filtrarTabla);

// Prevenir que se envíe el formulario al presionar Enter
filtroInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Previene el envío del formulario
    }
});

// Filtrar al cargar la página
filtrarTabla();


// Función para filtrar la tabla según la entrada de búsqueda
function buscador() {
    // Obtener el valor de búsqueda y convertirlo a minúsculas
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); // Remover espacios en blanco al inicio y final
    var table = document.getElementById('tableadministrador');
    var tr = table.getElementsByTagName('tr');

    // Recorrer todas las filas de la tabla, excepto la cabecera
    for (var i = 0; i < tr.length; i++) {
        var tdNombre = tr[i].getElementsByTagName('td')[0];
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        // var tdNombre = tr[i].getElementsByTagName('td')[2];
        var tdPrograma = tr[i].getElementsByTagName('td')[2];
        var tdCodigo = tr[i].getElementsByTagName('td')[3];
        var tdCorreo = tr[i].getElementsByTagName('td')[4];

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