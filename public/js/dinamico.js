function abrircuadro(){
    
  var coll = document.getElementsByClassName("btnVertical");
  var i;

  for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        
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
    switch(a){

        case 'vi':

        document.getElementById("enlaceIframe").src="page/viewInicio.php";

        break;
        case 'ti':

        document.getElementById("enlaceIframe").src="pagesupervision/sdti.php";

        break;
        
        case 'ads':

        document.getElementById("enlaceIframe").src="pagesupervision/sdads.php";

        break;

        case 'uc':

        document.getElementById("enlaceIframe").src="pagesupervision/suc.php";

        break;

        case 'rti':

        document.getElementById("enlaceIframe").src="actdesdepartamento/rdti.php";

        break;

        case 'rads':

        document.getElementById("enlaceIframe").src="actdesdepartamento/rdads.php";

        break;

        case 'reporte':

        document.getElementById("enlaceIframe").src="reportes/reporte.php";

        break;
    }
}