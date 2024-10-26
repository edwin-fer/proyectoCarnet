function agregarSlashes(input) {
    let valor = input.value.replace(/\D/g, ''); 
    if (valor.length > 2 && valor.length <= 4) {
        valor = valor.slice(0, 2) + '/' + valor.slice(2);
    } else if (valor.length > 4) {
        valor = valor.slice(0, 2) + '/' + valor.slice(2, 4) + '/' + valor.slice(4, 8);
    }
    input.value = valor;
}


 function verificarFecha() {

var inputFecha = document.getElementById('fechaInicio').value;


if (inputFecha.trim() === "") {
    
    var hoy = new Date();
    var dia = ("0" + hoy.getDate()).slice(-2);
    var mes = ("0" + (hoy.getMonth() + 1)).slice(-2);
    var anio = hoy.getFullYear();
    var fechaPorDefecto = dia + "/" + mes + "/" + anio;

    document.getElementById('fechaInicio').value = fechaPorDefecto;
}


return true;
}

function agregarSlashes(input) {
var valor = input.value;
if (valor.length === 2 || valor.length === 5) {
    input.value = valor + "/";
}
}

