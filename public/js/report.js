

function filtrarPorFecha() {
  const fechaInicio = new Date(document.getElementById('fechaInicio').value);
  const fechaFin = new Date(document.getElementById('fechaFin').value);
  console.log(fechaInicio);
  console.log(fechaFin);

  fechaInicio.setDate(fechaInicio.getDate() + 1);
  fechaFin.setDate(fechaFin.getDate() + 1);
  
  const filas = document.querySelectorAll('#tablaUsuarios tbody tr');
  
  filas.forEach(fila => {
    const fechaColumna = fila.querySelector('td.fecha') ? fila.querySelector('td.fecha').innerText : null;
    
    if (fechaColumna) {

      const [fechaInicioColumna, fechaFinColumna] = fechaColumna.split(' - ').map(fecha => new Date(fecha.trim()));
      

      if (fechaInicioColumna >= fechaInicio && fechaFinColumna < fechaFin) {
        fila.style.display = ''; 
      } else {
        fila.style.display = 'none'; 
      }
    } else {
      fila.style.display = 'none'; 
    }
  });
}

filtrarPorFecha();
