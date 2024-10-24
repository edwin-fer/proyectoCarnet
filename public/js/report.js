// function filtro(){

//     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
//     const fechaFin = new Date(document.getElementById('fechaFin').value);
//     fechaInicio.setDate(fechaInicio.getDate() + 1);
//     fechaFin.setDate(fechaFin.getDate() + 1);

//     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
//     filas.forEach(fila => {
//       const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
      
//       if (fechaColumna) {
//         // Extraer las fechas de inicio y fin del texto en la celda
//         const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
        
//         // Verifica si las fechas de la fila están dentro del rango seleccionado
//         if (fechaInicioColumna >= fechaInicio && fechaFinColumna < fechaFin) {
//           fila.style.display = ''; // Muestra la fila si cumple con el filtro
//         } else {
//           fila.style.display = 'none'; // Oculta la fila si no cumple con el filtro
//         }
//       } else {
//         fila.style.display = 'none'; // Oculta la fila si no tiene fechas válidas
//       }
//     });

    


//   document.getElementById('estado').addEventListener('change', function() {
    
//     const estadoSeleccionado = this.value;
//     const filasTabla = document.querySelectorAll('#tablaUsuarios tbody tr');
//     const columnasEstado = document.querySelectorAll('th.estado, td.estado');
//     const columnasFecha = document.querySelectorAll('th.fecha, td.fecha');
//     const columnasResponsable = document.querySelectorAll('th.responsable, td.responsable');
    

    
    
//     columnasEstado.forEach(columna => {

//             if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
                
//                 columna.style.display = '';
                
                
//             } else {
//                 columna.style.display = 'none';
//             }
            
            
//     });
    
//     columnasFecha.forEach(columna => {
//       if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
//         columna.style.display = '';
//       } else {
//         columna.style.display = 'none';
//       }
//     });
  
//     columnasResponsable.forEach(columna => {
//       if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
//         columna.style.display = '';
//       } else {
//         columna.style.display = 'none';
//       }
//     });

    
    
//   });

//   document.getElementById('tipoUsuario').addEventListener('change', function() {
//     const tipoUsuarioSeleccionado = this.value;
//     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
//     filas.forEach(fila => {
//       const tipo = fila.getAttribute('data-tipo');
//       if (tipoUsuarioSeleccionado === '' || tipo === tipoUsuarioSeleccionado) {
//         fila.style.display = '';
//       } else {
//         fila.style.display = 'none';
//       }
//     });
//   });

//   function filtrarTablaPorEstado() {
//     const tabla = document.getElementById("tablaUsuarios");
//     const filas = tabla.getElementsByTagName("tr");

//     for (let i = 1; i < filas.length; i++) { // Comenzar desde 1 para omitir el encabezado
//         const fila = filas[i];
//         const estado = fila.querySelector(".estado[data-estado='Cancelado']");

//         // Verificar si la fila tiene el estado "Cancelado"
//         if (!estado) {
//             fila.style.display = "none"; // Ocultar fila si no es "Cancelado"
//         } else {
//             fila.style.display = ""; // Mostrar fila si es "Cancelado"
//         }
//     }
// }

// document.getElementById("guardarDatos").addEventListener("click", function() {
//     const tabla = document.getElementById("tablaUsuarios");
//     const filas = tabla.getElementsByTagName("tr");
//     const datosGuardados = []; // Esta variable almacenará los datos visibles

//     for (let i = 1; i < filas.length; i++) {
//         const fila = filas[i];

//         // Solo guardar filas visibles
//         if (fila.style.display !== "none") {
//             const celdas = fila.getElementsByTagName("td");
//             const datosFila = Array.from(celdas).map(celda => celda.innerText);
//             datosGuardados.push(datosFila); // Guardar la fila en datosGuardados
//         }
//     }

//     // Mostrar en consola los datos guardados
//     console.log(datosGuardados); // Aquí puedes usar los datos visibles

//     // Si deseas hacer algo más con datosGuardados, como enviarlo a un servidor o almacenarlo, lo puedes hacer aquí.
// });



// }

// document.getElementById('fechaInicio').addEventListener('change', filtro);
//     document.getElementById('fechaFin').addEventListener('change', filtro);

// filtro()


// document.getElementById('filtrarBtn').addEventListener('click', function() {
//   // Obtener los valores de los filtros
//   const fechaInicio = document.getElementById('fechaInicio').value;
//   const fechaFin = document.getElementById('fechaFin').value;
//   const tipoUsuario = document.getElementById('tipoUsuario').value;
//   const estado = document.getElementById('estado').value;

//   // Obtener todas las filas de la tabla
//   const filas = document.querySelectorAll('#tablaUsuarios tbody tr');

//   // Recorrer cada fila de la tabla
//   filas.forEach(function(fila) {
//       const fechaInicioTexto = fila.querySelector('.fecha').textContent.split(' - ')[0].trim();
//       const fechaFinTexto = fila.querySelector('.fecha').textContent.split(' - ')[1].trim();
//       const tipoUsuarioFila = fila.querySelector('.tipoUsuario').getAttribute('data-usu');
//       const estadoFila = fila.querySelector('.estado').getAttribute('data-estado');
      
//       // Convertir las fechas de la fila y las fechas del filtro a Date
//       const fechaInicioFila = new Date(fechaInicioTexto);
//       const fechaFinFila = new Date(fechaFinTexto);
//       const fechaInicioFiltro = new Date(fechaInicio);
//       const fechaFinFiltro = new Date(fechaFin);

//       // Aplicar los filtros combinados
//       let mostrarFila = true;

//       // Filtrar por rango de fechas
//       if (fechaInicio && fechaFin) {
//           if (fechaInicioFila < fechaInicioFiltro || fechaFinFila > fechaFinFiltro) {
//               mostrarFila = false;
//           }
//       }

//       // Filtrar por tipo de usuario
//       if (tipoUsuario && tipoUsuarioFila !== tipoUsuario) {
//           mostrarFila = false;
//       }

//       // Filtrar por estado
//       if (estado && estadoFila !== estado) {
//           mostrarFila = false;
//       }

//       // Mostrar u ocultar la fila según si cumple con todos los filtros
//       if (mostrarFila) {
//           fila.style.display = '';
//       } else {
//           fila.style.display = 'none';
//       }
//   });
// });

function filtrarPorFecha() {
  const fechaInicio = new Date(document.getElementById('fechaInicio').value);
  const fechaFin = new Date(document.getElementById('fechaFin').value);
  console.log(fechaInicio);
  console.log(fechaFin);
  // Aumentamos la fecha de fin en 1 día para que sea inclusiva
  fechaInicio.setDate(fechaInicio.getDate() + 1);
  fechaFin.setDate(fechaFin.getDate() + 1);
  
  const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
  
  filas.forEach(fila => {
    const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
    
    if (fechaColumna) {
      // Extraer las fechas de inicio y fin del texto en la celda
      const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
      
      // Verifica si las fechas de la fila están dentro del rango seleccionado
      if (fechaInicioColumna >= fechaInicio && fechaFinColumna < fechaFin) {
        fila.style.display = ''; // Muestra la fila si cumple con el filtro
      } else {
        fila.style.display = 'none'; // Oculta la fila si no cumple con el filtro
      }
    } else {
      fila.style.display = 'none'; // Oculta la fila si no tiene fechas válidas
    }
  });
}

filtrarPorFecha();
