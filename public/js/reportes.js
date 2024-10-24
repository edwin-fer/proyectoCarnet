
// // document.getElementById('tipoUsuario').addEventListener('change', filtrarTabla);
// // document.getElementById('estado').addEventListener('change', filtrarTabla);

// // function filtrarTabla() {
// //   const tipoUsuario = document.getElementById('tipoUsuario').value;
// //   const estado = document.getElementById('estado').value;
  
// //   const filas = document.querySelectorAll('#tablaUsuarios tbody tr');

// //   filas.forEach(fila => {
// //     const tipo = fila.getAttribute('data-tipo');
// //     const est = fila.getAttribute('data-estado');

// //     const coincideTipo = tipoUsuario === '' || tipo === tipoUsuario;
// //     const coincideEstado = estado === '' || est === estado;

// //     if (coincideTipo && coincideEstado) {
// //       fila.style.display = '';
// //     } else {
// //       fila.style.display = 'none';
// //     }
// //   });
// // }


// document.getElementById('estado').addEventListener('change', function() {
//     const estadoSeleccionado = this.value;
//     const columnasEstado = document.querySelectorAll('th.estado, td.estado');
//     const columnasFecha = document.querySelectorAll('th.fecha, td.fecha');
//     const columnasResponsable = document.querySelectorAll('th.responsable, td.responsable');
    
//     columnasEstado.forEach(columna => {
//       if (estadoSeleccionado === '' || columna.getAttribute('data-estado') === estadoSeleccionado) {
//         columna.style.display = '';
//       } else {
//         columna.style.display = 'none';
//       }
//     });
    
//     columnasFecha.forEach(columna => {
//       if (estadoSeleccionado === '' || columna.getAttribute('data-estado') === estadoSeleccionado) {
//         columna.style.display = '';
//       } else {
//         columna.style.display = 'none';
//       }
//     });
  
//     columnasResponsable.forEach(columna => {
//       if (estadoSeleccionado === '' || columna.getAttribute('data-estado') === estadoSeleccionado) {
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



// //   document.getElementById('filtrarFecha').addEventListener('click', function() {
// //     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
// //     const fechaFin = new Date(document.getElementById('fechaFin').value);
    
// //     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
// //     filas.forEach(fila => {
// //       const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
      
// //       if (fechaColumna) {
// //         // Extraer las fechas de inicio y fin del texto en la celda
// //         const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
        
// //         // Verifica si las fechas de la fila están dentro del rango seleccionado
// //         if (fechaInicioColumna >= fechaInicio && fechaFinColumna <= fechaFin) {
// //           fila.style.display = ''; // Muestra la fila si cumple con el filtro
// //         } else {
// //           fila.style.display = 'none'; // Oculta la fila si no cumple con el filtro
// //         }
// //       } else {
// //         fila.style.display = 'none'; // Oculta la fila si no tiene fechas válidas
// //       }
// //     });
// //   });
  

// // // Función para filtrar por fechas
// // function filtrarPorFecha() {
// //     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
// //     const fechaFin = new Date(document.getElementById('fechaFin').value);
    
// //     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
// //     filas.forEach(fila => {
// //       const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
      
// //       if (fechaColumna) {
// //         // Extraer las fechas de inicio y fin del texto en la celda
// //         const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
        
// //         // Verifica si las fechas de la fila están dentro del rango seleccionado
// //         if (fechaInicioColumna >= fechaInicio && fechaFinColumna <= fechaFin) {
// //           fila.style.display = ''; // Muestra la fila si cumple con el filtro
// //         } else {
// //           fila.style.display = 'none'; // Oculta la fila si no cumple con el filtro
// //         }
// //       } else {
// //         fila.style.display = 'none'; // Oculta la fila si no tiene fechas válidas
// //       }
// //     });
// //   }
  
// //   // Escucha cambios en los inputs de fecha y ejecuta el filtro
// //   document.getElementById('fechaInicio').addEventListener('change', filtrarPorFecha);
// //   document.getElementById('fechaFin').addEventListener('change', filtrarPorFecha);
  
  


// // Función para filtrar por fechas
// function filtrarPorFecha() {
//     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
//     const fechaFin = new Date(document.getElementById('fechaFin').value);
    
//     // Aumentamos la fecha de fin en 1 día para que sea inclusiva
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
//   }
  
//   // Escucha cambios en los inputs de fecha y ejecuta el filtro
//   document.getElementById('fechaInicio').addEventListener('change', filtrarPorFecha);
//   document.getElementById('fechaFin').addEventListener('change', filtrarPorFecha);
  











// // Función para filtrar la tabla considerando los tres filtros: tipo de usuario, estado y fechas











// function aplicarFiltros() {
//     const tipoUsuario = document.getElementById('tipoUsuario').value.toLowerCase();
//     const estado = document.getElementById('estado').value.toLowerCase();
//     const fechaInicio = new Date(document.getElementById('fechaInicio').value);
//     const fechaFin = new Date(document.getElementById('fechaFin').value);
    
//     // Aumentamos la fecha de fin en 1 día para que sea inclusiva
//     fechaFin.setDate(fechaFin.getDate() + 1);
    
//     const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
//     filas.forEach(fila => {
//       // Obtiene los datos de la fila
//       const tipoUsuarioFila = fila.querySelector('td.tipoUsuario').innerText.toLowerCase();
//       const estadoFila = fila.querySelector('td.estado').innerText.toLowerCase();
//       const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
      
//       let mostrarFila = true;
  
//       // Filtrado por tipo de usuario
//       if (tipoUsuario && tipoUsuarioFila !== tipoUsuario) {
//         mostrarFila = false;
//       }
  
//       // Filtrado por estado
//       if (estado && estadoFila !== estado) {
//         mostrarFila = false;
//       }
  
//       // Filtrado por fechas
//       if (fechaColumna) {
//         const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
        
//         if (fechaInicio && fechaFin && (fechaInicioColumna < fechaInicio || fechaFinColumna >= fechaFin)) {
//           mostrarFila = false;
//         }
//       }
  
//       // Mostrar u ocultar la fila según si cumple los filtros
//       fila.style.display = mostrarFila ? '' : 'none';
//     });
//   }
  
//   // Escuchar cambios en los selects de tipo de usuario y estado
//   document.getElementById('tipoUsuario').addEventListener('change', aplicarFiltros);
//   document.getElementById('estado').addEventListener('change', aplicarFiltros);
  
//   // Escuchar cambios en los inputs de fecha y ejecutar el filtro
//   document.getElementById('fechaInicio').addEventListener('change', aplicarFiltros);
//   document.getElementById('fechaFin').addEventListener('change', aplicarFiltros);
  






// Función para filtrar la tabla considerando los tres filtros: tipo de usuario, estado y fechas
function aplicarFiltros() {
    const tipoUsuario = document.getElementById('tipoUsuario').value.toLowerCase();
    const estado = document.getElementById('estado').value.toLowerCase();
    const fechaInicio = new Date(document.getElementById('fechaInicio').value);
    const fechaFin = new Date(document.getElementById('fechaFin').value);
    
    // Aumentamos la fecha de fin en 1 día para que sea inclusiva
    fechaFin.setDate(fechaFin.getDate() + 1);
    
    const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
    filas.forEach(fila => {
      // Obtiene los datos de la fila
      const tipoUsuarioFila = fila.querySelector('td.tipoUsuario').innerText.toLowerCase();
      const estadoFila = fila.querySelector('td.estado').innerText.toLowerCase();
      const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
      
      let mostrarFila = true;
  
      // Filtrado por tipo de usuario
      if (tipoUsuario && tipoUsuarioFila !== tipoUsuario) {
        mostrarFila = false;
      }
  
      // Filtrado por estado
      if (estado && estadoFila !== estado) {
        mostrarFila = false;
      }
  
      // Filtrado por fechas
      if (fechaColumna) {
        const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
        
        if (fechaInicio && fechaFin && (fechaInicioColumna < fechaInicio || fechaFinColumna >= fechaFin)) {
          mostrarFila = false;
        }
      }
  
      // Mostrar u ocultar la fila según si cumple los filtros
      fila.style.display = mostrarFila ? '' : 'none';
    });
  }
  
  // Escuchar cambios en los selects de tipo de usuario y estado
  document.getElementById('tipoUsuario').addEventListener('change', aplicarFiltros);
  document.getElementById('estado').addEventListener('change', aplicarFiltros);
  
  // Escuchar cambios en los inputs de fecha y ejecutar el filtro
  document.getElementById('fechaInicio').addEventListener('change', aplicarFiltros);
  document.getElementById('fechaFin').addEventListener('change', aplicarFiltros);
  