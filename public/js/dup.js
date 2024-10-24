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

