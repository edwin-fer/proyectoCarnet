
const footer = document.querySelector('.footer');


function checkFooter() {
    if (!document.body.contains(footer)) {
        alert("El footer no se puede eliminar. La página dejará de funcionar.");

        document.body.innerHTML = "<h1>¡La página ha sido desactivada!</h1>";
    }
}


const observer = new MutationObserver(checkFooter);
observer.observe(document.body, { childList: true, subtree: true });
