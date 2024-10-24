// Selecciona el footer
const footer = document.querySelector('.footer');

// Función para mostrar un mensaje si se intenta eliminar el footer
function checkFooter() {
    if (!document.body.contains(footer)) {
        alert("El footer no se puede eliminar. La página dejará de funcionar.");
        // Aquí puedes incluir lógica adicional para "detener" la funcionalidad de la página
        document.body.innerHTML = "<h1>¡La página ha sido desactivada!</h1>";
    }
}

// Observa cambios en el DOM para detectar si el footer ha sido eliminado
const observer = new MutationObserver(checkFooter);
observer.observe(document.body, { childList: true, subtree: true });
