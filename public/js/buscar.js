
function buscador() {

    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim(); 
    var table = document.getElementById('tablaUsuarios');
    var tr = table.getElementsByTagName('tr');


    for (var i = 0; i < tr.length; i++) {
        
        var tdCedula = tr[i].getElementsByTagName('td')[1];
        var tdNombre = tr[i].getElementsByTagName('td')[0];
        var tdPrograma = tr[i].getElementsByTagName('td')[2];

        if (tdNombre || tdCedula || tdPrograma) {

            var txtNombre = tdNombre.textContent.toLowerCase();
            var txtCedula = tdCedula.textContent;
            var txtPrograma = tdPrograma.textContent.toLowerCase();


            var partesNombre = txtNombre.split(' ');


            var coincide = partesNombre.some(parte => parte.startsWith(filter)) || 
                           txtNombre.includes(filter) || 
                           txtCedula.includes(filter) || 
                           txtPrograma.includes(filter);

                           
            tr[i].style.display = coincide ? '' : 'none';
        }
    }
}

buscador()
    