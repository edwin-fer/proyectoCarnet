document.getElementById('descargarBtn').addEventListener('click', function() {
    
    const tabla = document.getElementById('tablaUsuarios');
    const filas = Array.from(tabla.rows).map(row => 
        Array.from(row.cells).map(cell => cell.innerText.replace(/,/g, ';')).join(',') 
    ).join('\n');


    const blob = new Blob([filas], { type: 'text/csv;charset=utf-8;' });

    
    const enlace = document.createElement('a');
    const url = URL.createObjectURL(blob);
    enlace.setAttribute('href', url);
    enlace.setAttribute('download', 'tabla_datos.csv');
    enlace.style.visibility = 'hidden';
    document.body.appendChild(enlace);
    enlace.click();
    document.body.removeChild(enlace);

    
});

