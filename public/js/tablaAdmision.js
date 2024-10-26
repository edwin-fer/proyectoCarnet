
const tipoUsuarioSelect = document.getElementById('etd');
const filasTabla = document.querySelectorAll('#tableAdmision tbody tr');


function filtrarTabla() {
    const tipoSeleccionado = tipoUsuarioSelect.value;

    filasTabla.forEach(fila => {
        const tipoUsuario = fila.getAttribute('data-tipo');
        if (tipoSeleccionado === 'todos' || tipoUsuario === tipoSeleccionado) {
            fila.style.display = ''; 
        } else {
            fila.style.display = 'none'; 
        }
    });
}

tipoUsuarioSelect.addEventListener('change', filtrarTabla);

filtrarTabla();




function buscador() {

    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); 
    var table = document.getElementById('tableAdmision');
    var tr = table.getElementsByTagName('tr');

    for (var i = 0; i < tr.length; i++) {
        
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        var tdNombre = tr[i].getElementsByTagName('td')[2];
        var tdPrograma = tr[i].getElementsByTagName('td')[3];
        var tdCorreo = tr[i].getElementsByTagName('td')[7];
        var tdCodigo = tr[i].getElementsByTagName('td')[6];

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