

function filtrarTabla() {
    const estadoSelect = document.getElementById("estado");
    const tipoUsuarioSelect = document.getElementById("tipoUsuario");
    const fechaInicio = document.getElementById("fechaInicio").value;
    const fechaFin = document.getElementById("fechaFin").value;
    const tabla = document.getElementById("tablaUsuarios");
    const filas = tabla.getElementsByTagName("tr");
    
    for (let i = 1; i < filas.length; i++) { 
        const fila = filas[i];
        const estado = fila.querySelector('.estado').textContent.trim();
        const tipoUsuario = fila.querySelector('.tipoUsuario').textContent.trim();
        const fechaFila = fila.querySelector('.fecha').textContent.trim();

        let mostrarFila = true;

        if (estadoSelect.value && estado !== estadoSelect.value) {
            mostrarFila = false;
        }

        if (tipoUsuarioSelect.value && tipoUsuario !== tipoUsuarioSelect.value) {
            mostrarFila = false;
        }

        if (fechaInicio && fechaFin) {
            const fechaInicioFecha = new Date(fechaInicio);
            const fechaFinFecha = new Date(fechaFin);
            const fechaFilaDate = new Date(fechaFila);

            if (fechaFilaDate < fechaInicioFecha || fechaFilaDate > fechaFinFecha) {
                mostrarFila = false;
            }
        }

        fila.style.display = mostrarFila ? "" : "none"; 
    }
}
