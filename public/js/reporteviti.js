document.getElementById('tipoUsuario').addEventListener('change', function() {
    const tipoUsuarioSeleccionado = this.value;
    const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
    
    filas.forEach(fila => {
      const tipo = fila.getAttribute('data-tipo');
      if (tipoUsuarioSeleccionado === 'todos' || tipo === tipoUsuarioSeleccionado) {
        fila.style.display = '';
      } else {
        fila.style.display = 'none';
      }
    });
  });



  document.getElementById('estado').addEventListener('change', function() {
    
    const estadoSeleccionado = this.value;
    const filasTabla = document.querySelectorAll('#tablaUsuarios tbody tr');
    const columnasEstado = document.querySelectorAll('th.estado, td.estado');
    const columnasFecha = document.querySelectorAll('th.fecha, td.fecha');
    const columnasResponsable = document.querySelectorAll('th.responsable, td.responsable');

    
    
    columnasEstado.forEach(columna => {

            if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
                
                columna.style.display = '';
                
                
            } else {
                columna.style.display = 'none';
            }
            
            
    });
    
    columnasFecha.forEach(columna => {
      if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
        columna.style.display = '';
      } else {
        columna.style.display = 'none';
      }
    });
  
    columnasResponsable.forEach(columna => {
      if (estadoSeleccionado === 'todos' || columna.getAttribute('data-estado') === estadoSeleccionado) {
        columna.style.display = '';
      } else {
        columna.style.display = 'none';
      }
    });

    
    
  });