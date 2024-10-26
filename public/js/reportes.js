




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
  