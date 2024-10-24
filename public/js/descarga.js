document.getElementById('descargarBtn').addEventListener('click', function() {
    // Obtener la tabla
    const tabla = document.getElementById('tablaUsuarios');
    const filas = Array.from(tabla.rows).map(row => 
        Array.from(row.cells).map(cell => cell.innerText.replace(/,/g, ';')).join(',') // Reemplazar comas por punto y coma
    ).join('\n');

    // Crear un blob con el contenido CSV
    const blob = new Blob([filas], { type: 'text/csv;charset=utf-8;' });

    // Crear un enlace para la descarga
    const enlace = document.createElement('a');
    const url = URL.createObjectURL(blob);
    enlace.setAttribute('href', url);
    enlace.setAttribute('download', 'tabla_datos.csv');
    enlace.style.visibility = 'hidden';
    document.body.appendChild(enlace);
    enlace.click();
    document.body.removeChild(enlace);

    
});

