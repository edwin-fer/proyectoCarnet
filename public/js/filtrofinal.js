// document.addEventListener("DOMContentLoaded", function() {
//     // Obtiene referencias a los elementos del DOM
//     const estadoSelect = document.getElementById("estado");
//     const tipoUsuarioSelect = document.getElementById("tipoUsuario");
//     const fechaInicioInput = document.getElementById("fechaInicio");
//     const fechaFinInput = document.getElementById("fechaFin");
//     const tablaUsuarios = document.getElementById("tablaUsuarios").getElementsByTagName("tbody")[0];

//     // Función para filtrar la tabla
//     function filtrarTabla() {
//         const estadoSeleccionado = estadoSelect.value;
//         const tipoUsuarioSeleccionado = tipoUsuarioSelect.value;
//         const fechaInicio = new Date(fechaInicioInput.value);
//         const fechaFin = new Date(fechaFinInput.value);

//         // Itera sobre las filas de la tabla
//         for (let i = 0; i < tablaUsuarios.rows.length; i++) {
//             const fila = tablaUsuarios.rows[i];
//             const estado = fila.querySelector(".estado[data-estado='" + estadoSeleccionado + "']");
//             const tipoUsuario = fila.querySelector(".tipoUsuario").textContent;
//             const fechaInicioFila = new Date(fila.querySelector(".fecha[data-estado='pendientes']").textContent.split(" - ")[0]);
//             const fechaFinFila = new Date(fila.querySelector(".fecha[data-estado='pendientes']").textContent.split(" - ")[1]);

//             // Verifica si la fila debe mostrarse
//             let mostrarFila = true;

//             // Filtro de estado
//             if (estadoSeleccionado && estado) {
//                 mostrarFila = estado.textContent.toLowerCase() === estadoSeleccionado.toLowerCase();
//             }

//             // Filtro de tipo de usuario
//             if (tipoUsuarioSeleccionado) {
//                 mostrarFila = mostrarFila && tipoUsuario.toLowerCase() === tipoUsuarioSeleccionado.toLowerCase();
//             }

//             // Filtro de fecha
//             if (fechaInicioInput.value && fechaFinInput.value) {
//                 mostrarFila = mostrarFila && fechaInicioFila >= fechaInicio && fechaFinFila <= fechaFin;
//             }

//             // Muestra u oculta la fila
//             fila.style.display = mostrarFila ? "" : "none";
//         }
//     }

//     // Agregar event listeners para los cambios en los filtros
//     estadoSelect.addEventListener("change", filtrarTabla);
//     tipoUsuarioSelect.addEventListener("change", filtrarTabla);
//     fechaInicioInput.addEventListener("change", filtrarTabla);
//     fechaFinInput.addEventListener("change", filtrarTabla);
// });


// document.addEventListener("DOMContentLoaded", function() {
//     // Obtiene referencias a los elementos del DOM
//     const estadoSelect = document.getElementById("estado");
//     const tipoUsuarioSelect = document.getElementById("tipoUsuario");
//     const fechaInicioInput = document.getElementById("fechaInicio");
//     const fechaFinInput = document.getElementById("fechaFin");
//     const tablaUsuarios = document.getElementById("tablaUsuarios").getElementsByTagName("tbody")[0];

//     // Función para filtrar la tabla
//     function filtrarTabla() {
//         const estadoSeleccionado = estadoSelect.value.toLowerCase();
//         const tipoUsuarioSeleccionado = tipoUsuarioSelect.value.toLowerCase();
//         const fechaInicio = new Date(fechaInicioInput.value);
//         const fechaFin = new Date(fechaFinInput.value);
//         const fechaInicioValid = !isNaN(fechaInicio.getTime());
//         const fechaFinValid = !isNaN(fechaFin.getTime());

//         // Itera sobre las filas de la tabla
//         for (let i = 0; i < tablaUsuarios.rows.length; i++) {
//             const fila = tablaUsuarios.rows[i];
//             const estadosFila = Array.from(fila.querySelectorAll(".estado"));
//             const tipoUsuario = fila.querySelector(".tipoUsuario").textContent.toLowerCase();
//             let mostrarFila = true;

//             // Filtro de estado
//             if (estadoSeleccionado) {
//                 const estadoCoincide = estadosFila.some(estado => estado.getAttribute("data-estado") === estadoSeleccionado && estado.textContent.trim().toLowerCase() !== "");
//                 mostrarFila = mostrarFila && estadoCoincide;
//             }

//             // Filtro de tipo de usuario
//             if (tipoUsuarioSeleccionado) {
//                 mostrarFila = mostrarFila && tipoUsuario === tipoUsuarioSeleccionado;
//             }

//             // Filtro de fecha
//             if (fechaInicioValid && fechaFinValid) {
//                 const fechasFila = estadosFila.map(estado => {
//                     const fechaText = estado.nextElementSibling.textContent.split(" - ");
//                     return {
//                         inicio: new Date(fechaText[0]),
//                         fin: new Date(fechaText[1])
//                     };
//                 });

//                 const fechaCoincide = fechasFila.some(fecha => fecha.inicio >= fechaInicio && fecha.fin <= fechaFin);
//                 mostrarFila = mostrarFila && fechaCoincide;
//             }

//             // Muestra u oculta la fila
//             fila.style.display = mostrarFila ? "" : "none";
//         }
//     }

//     // Agregar event listeners para los cambios en los filtros
//     estadoSelect.addEventListener("change", filtrarTabla);
//     tipoUsuarioSelect.addEventListener("change", filtrarTabla);
//     fechaInicioInput.addEventListener("change", filtrarTabla);
//     fechaFinInput.addEventListener("change", filtrarTabla);
// });


// function filtrarTabla() {
//     const estadoSeleccionado = document.getElementById('estado').value;
//     const tipoUsuarioSeleccionado = document.getElementById('tipoUsuario').value;
//     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
//     const fechaFin = new Date(document.getElementById('fechaFin').value);
//     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');

//     filas.forEach(fila => {
//         const estadoCeldas = fila.querySelectorAll('.estado');
//         const tipoUsuario = fila.getAttribute('data-tipo');
//         let mostrarFila = true;

//         // Filtrado por tipo de usuario
//         if (tipoUsuarioSeleccionado && tipoUsuario !== tipoUsuarioSeleccionado) {
//             mostrarFila = false;
//         }

//         // Filtrado por estado
//         if (estadoSeleccionado) {
//             let estadoCoincide = false;
//             estadoCeldas.forEach(celda => {
//                 if (celda.getAttribute('data-estado') === estadoSeleccionado) {
//                     estadoCoincide = true;
//                 }
//             });
//             if (!estadoCoincide) {
//                 mostrarFila = false;
//             }
//         }

//         // Filtrado por fechas
//         if (fechaInicio && fechaFin) {
//             let fechaValida = false;
//             estadoCeldas.forEach(celda => {
//                 const fechaInicioCelda = new Date(celda.innerText.split('-')[0].trim());
//                 const fechaFinCelda = new Date(celda.innerText.split('-')[1].trim());

//                 if (fechaInicioCelda >= fechaInicio && fechaFinCelda <= fechaFin) {
//                     fechaValida = true;
//                 }
//             });
//             if (!fechaValida) {
//                 mostrarFila = false;
//             }
//         }

//         // Mostrar u ocultar la fila
//         if (mostrarFila) {
//             fila.style.display = '';
//         } else {
//             fila.style.display = 'none';
//         }
//     });
// }

// // Añadir event listeners a los selectores y inputs de fechas
// document.getElementById('estado').addEventListener('change', filtrarTabla);
// document.getElementById('tipoUsuario').addEventListener('change', filtrarTabla);
// document.getElementById('fechaInicio').addEventListener('change', filtrarTabla);
// document.getElementById('fechaFin').addEventListener('change', filtrarTabla);


// function filtrarTabla() {
//     const estadoSelect = document.getElementById("estado");
//     const tipoUsuarioSelect = document.getElementById("tipoUsuario");
//     const fechaInicio = document.getElementById("fechaInicio").value;
//     const fechaFin = document.getElementById("fechaFin").value;
//     const tabla = document.getElementById("tablaUsuarios");
//     const filas = tabla.getElementsByTagName("tr");
    
//     for (let i = 1; i < filas.length; i++) {
//         const fila = filas[i];
//         const estado = fila.querySelector('.estado').textContent.trim();
//         const tipoUsuario = fila.querySelector('.tipoUsuario').textContent.trim();

//         const estadoSeleccionado = estadoSelect.value;
//         const tipoUsuarioSeleccionado = tipoUsuarioSelect.value;

//         const fechaInicioFila = fila.querySelector('.fecha[data-estado="pendientes"]').textContent.trim();
//         const fechaFinFila = fila.querySelector('.fecha[data-estado="pendientes"]').textContent.trim();

//         // Aquí puedes hacer la lógica para filtrar
//         let mostrarFila = true;

//         // Filtrar por estado
//         if (estadoSeleccionado && estado !== estadoSeleccionado) {
//             mostrarFila = false;
//         }

//         // Filtrar por tipo de usuario
//         if (tipoUsuarioSeleccionado && tipoUsuario !== tipoUsuarioSeleccionado) {
//             mostrarFila = false;
//         }

//         // Filtrar por rango de fechas
//         if (fechaInicio && fechaFin) {
//             const fechaInicioFecha = new Date(fechaInicio);
//             const fechaFinFecha = new Date(fechaFin);
//             const [fechaInicioFilaString, fechaFinFilaString] = fechaInicioFila.split(" - ").map(f => new Date(f));
            
//             if ((fechaInicioFecha > fechaFinFilaString) || (fechaFinFecha < fechaInicioFilaString)) {
//                 mostrarFila = false;
//             }
//         }

//         fila.style.display = mostrarFila ? "" : "none";
//     }
// }


function filtrarTabla() {
    const estadoSelect = document.getElementById("estado");
    const tipoUsuarioSelect = document.getElementById("tipoUsuario");
    const fechaInicio = document.getElementById("fechaInicio").value;
    const fechaFin = document.getElementById("fechaFin").value;
    const tabla = document.getElementById("tablaUsuarios");
    const filas = tabla.getElementsByTagName("tr");
    
    for (let i = 1; i < filas.length; i++) { // Comenzamos en 1 para omitir la fila del encabezado
        const fila = filas[i];
        const estado = fila.querySelector('.estado').textContent.trim();
        const tipoUsuario = fila.querySelector('.tipoUsuario').textContent.trim();
        const fechaFila = fila.querySelector('.fecha').textContent.trim();

        let mostrarFila = true;

        // Filtrar por estado
        if (estadoSelect.value && estado !== estadoSelect.value) {
            mostrarFila = false;
        }

        // Filtrar por tipo de usuario
        if (tipoUsuarioSelect.value && tipoUsuario !== tipoUsuarioSelect.value) {
            mostrarFila = false;
        }

        // Filtrar por rango de fechas
        if (fechaInicio && fechaFin) {
            const fechaInicioFecha = new Date(fechaInicio);
            const fechaFinFecha = new Date(fechaFin);
            const fechaFilaDate = new Date(fechaFila);

            if (fechaFilaDate < fechaInicioFecha || fechaFilaDate > fechaFinFecha) {
                mostrarFila = false;
            }
        }

        fila.style.display = mostrarFila ? "" : "none"; // Mostrar u ocultar la fila
    }
}
