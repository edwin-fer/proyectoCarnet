function abrircuadro(){
    
    var coll = document.getElementsByClassName("btnVertical");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
        // this.classList.toggle("active");
    var conten = this.nextElementSibling;
    if (conten.style.display === "block") {
      conten.style.display = "none";
    } else {

        for(let j = 0; j < coll.length; j++){

            if(i !== j){
                coll[j].nextElementSibling.style.display = "none";
                
            }
        }
      conten.style.display = "block";
    }
  });
}
}


function cambioIframe(a){
    
    switch (a) {
    
            case 'vi':
                document.getElementById("enlaceIframe").src="page/viewInicio.php"        
            break;
    
            case 'vipp':
                document.getElementById("enlaceIframe").src="pagepregradoprimer/vipp.php"    
            break;
    
            case 'vip':
                document.getElementById("enlaceIframe").src="pagepregrado/vip.php"
            break;
        
            case 'viptp':
                document.getElementById("enlaceIframe").src="pagepostprimer/viptp.php"
            break;
    
            case 'vipt':
                document.getElementById("enlaceIframe").src="pagepost/vipt.php"
            break;
    
            case 'vig':
                document.getElementById("enlaceIframe").src="pagegrado/vig.php"
            break;

            case 'vie':
                document.getElementById("enlaceIframe").src="pageegresado/vie.php"
            break;

            case 'vijp':
                document.getElementById("enlaceIframe").src="pagejefatura/vijp.php"
            break;

            case 'vid':
                document.getElementById("enlaceIframe").src="pageduplicado/vid.php"
            break;

        
    
    
    
        default:
            break;
    }

}