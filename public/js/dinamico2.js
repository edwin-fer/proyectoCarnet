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
    
    
            case 'rupp':
                document.getElementById("enlaceIframe").src="pagepregradoprimer/rupp.php"
            break;
    
    
            case 'saspp':
                document.getElementById("enlaceIframe").src="pagepregradoprimer/saspp.php"
            break;
    
            case 'vip':
                document.getElementById("enlaceIframe").src="pagepregrado/vip.php"
            break;
    
            case 'rup':
                document.getElementById("enlaceIframe").src="pagepregrado/rup.php"
            break;
            // esta ruta puede registrar varios archivos, se omite po que no estaba en los requerimientos
            // case 'sasp':
            //     document.getElementById("enlaceIframe").src="pagepregrado/sasp.php"
            // break;
        
            case 'viptp':
                document.getElementById("enlaceIframe").src="pagepostprimer/viptp.php"
            break;
    
            case 'ruptp':
                document.getElementById("enlaceIframe").src="pagepostprimer/ruptp.php"
            break;
    
            case 'sasptp':
                document.getElementById("enlaceIframe").src="pagepostprimer/sasptp.php"
            break;
    
            case 'vipt':
                document.getElementById("enlaceIframe").src="pagepost/vipt.php"
            break;
    
            case 'rupt':
                document.getElementById("enlaceIframe").src="pagepost/rupt.php"
            break;
             // esta ruta puede registrar varios archivos, se omite po que no estaba en los requerimientos
            // case 'saspt':
            //     document.getElementById("enlaceIframe").src="pagepost/saspt.php"
            // break;
    
            case 'vig':
                document.getElementById("enlaceIframe").src="pagegrado/vig.php"
            break;
    
            case 'rug':
                document.getElementById("enlaceIframe").src="pagegrado/rug.php"
            break;

            case 'sasg':
                document.getElementById("enlaceIframe").src="pagegrado/sasg.php"
            break;

            case 'vie':
                document.getElementById("enlaceIframe").src="pageegresado/vie.php"
            break;

            case 'rue':
                document.getElementById("enlaceIframe").src="pageegresado/rue.php"
            break;

            // case 'sase':
            //     document.getElementById("enlaceIframe").src="pageegresado/sase.php"
            // break;

            case 'vijp':
                document.getElementById("enlaceIframe").src="pagejefatura/vijp.php"
            break;

            case 'rujp':
                document.getElementById("enlaceIframe").src="pagejefatura/rujp.php"
            break;

            // case 'sasjp':
            //     document.getElementById("enlaceIframe").src="pagejefatura/sasjp.php"
            // break;

            case 'vid':
                document.getElementById("enlaceIframe").src="pageduplicado/vid.php"
            break;

            case 'rud':
                document.getElementById("enlaceIframe").src="pageduplicado/rud.php"
            break;

            // case 'sasd':
            //     document.getElementById("enlaceIframe").src="pageduplicado/sasd.php"
            // break;

        
    
    
    
        default:
            break;
    }

}