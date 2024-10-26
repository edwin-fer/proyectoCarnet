
const tipoUsuarioSelectcart = document.getElementById('carnt');
const filasTablacart = document.querySelectorAll('#tableadministrador tbody tr');


function filtrarTablacart() {
    const tipoSeleccionado = tipoUsuarioSelectcart.value;

    filasTablacart.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; 
        } else {
            fila.style.display = 'none'; 
        }
    });
}


tipoUsuarioSelect.addEventListener('change', filtrarTablacart);


filtrarTablacart();




const tipoUsuarioSelecttipo = document.getElementById('tipo');
const filasTablatipo = document.querySelectorAll('#tableadministrador tbody tr');


function filtrarTablatipo() {
    const tipoSeleccionado = tipoUsuarioSelecttipo.value;

    filasTablatipo.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; 
        } else {
            fila.style.display = 'none'; 
        }
    });
}


tipoUsuarioSelect.addEventListener('change', filtrarTablatipo);


filtrarTablatipo();





const tipoUsuarioSelect = document.getElementById('etd');
const filasTabla = document.querySelectorAll('#tableadministrador tbody tr');
const filtroInput = document.getElementById('filtroInput');


function filtrarTabla() {
    const tipoSeleccionado = tipoUsuarioSelect.value;
    const textoFiltro = filtroInput.value.toLowerCase();

    filasTabla.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        const nombreUsuario = fila.querySelector('td:first-child').textContent.toLowerCase();

        if ((tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) &&
            (nombreUsuario.includes(textoFiltro))) {
            fila.style.display = ''; 
        } else {
            fila.style.display = 'none'; 
        }
    });
}


tipoUsuarioSelect.addEventListener('change', filtrarTabla);


filtroInput.addEventListener('input', filtrarTabla);


filtroInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); 
    }
});


filtrarTabla();



function buscador() {
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); 
    var table = document.getElementById('tableadministrador');
    var tr = table.getElementsByTagName('tr');


    for (var i = 0; i < tr.length; i++) {
        var tdNombre = tr[i].getElementsByTagName('td')[0];
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        // var tdNombre = tr[i].getElementsByTagName('td')[2];
        var tdPrograma = tr[i].getElementsByTagName('td')[2];
        var tdCodigo = tr[i].getElementsByTagName('td')[3];
        var tdCorreo = tr[i].getElementsByTagName('td')[4];

        if (tdNombre || tdCedula || tdPrograma || tdCodigo || tdCorreo) {
           
            var txtNombre = tdNombre.textContent.toLowerCase();
            var txtCedula = tdCedula.textContent;
            var txtPrograma = tdPrograma.textContent.toLowerCase();
            var txtCodigo = tdCodigo.textContent;
            var txtCorreo = tdCorreo.textContent.toLowerCase();

            var partesNombre = txtNombre.split(' ');


            var coincide = partesNombre.some(parte => parte.startsWith(filter)) || 
                           txtNombre.includes(filter) || 
                           txtCedula.includes(filter) || 
                           txtPrograma.includes(filter) || 
                           txtCodigo.includes(filter) || 
                           txtCorreo.includes(filter);

            tr[i].style.display = coincide ? '' : 'none';
        }
    }
}
buscador()