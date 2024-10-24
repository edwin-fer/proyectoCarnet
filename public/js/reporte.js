
document.addEventListener("DOMContentLoaded", function() {
    


    function fecha(){


        var tipoUs = document.getElementsByClassName("nom-busq");
        var checboxx = document.querySelectorAll(".checkbox");
        var subBlo =document.querySelectorAll(".sub-bloque")
        
        for(let i = 0; i < tipoUs.length; i++){

            tipoUs[i].addEventListener("click", function(){
                
                
                var cont = tipoUs[i].nextElementSibling;
                
                if(cont.style.display === "block"){
                    
                    
                    cont.style.display = "none";
                    
                }else{

                    

                    //   for(let j = 0; j <= checboxx.length; j++){
                        
                    //       checboxx[i].checked = false;
                    //       subBlo[i].style.display = "none";
                    //       cont.style.display = "block";
                    //       }
                        cont.style.display = "block";
                    
                }

                
            });

            

        }


        for(let i = 0; i < checboxx.length; i++){

            checboxx[i].addEventListener("click", function(){

                

                if(i < 5){

                    var cont =checboxx[i].nextElementSibling;
                    
                    if(cont = subBlo[i].style.display === "flex"){
                        checboxx[i].checked = false;
                        subBlo[i].style.display = "none";
                    }else{

                        for(let j = 0; j <= 4; j++){

                            if(i !== j){
                                
                                checboxx[j].checked = false;
                                subBlo[j].style.display = "none";
                            }

                            subBlo[i].style.display = "flex";
                        }
                    }
                }else{

                    var cont =checboxx[i].nextElementSibling;
                    if(i > subBlo.length){

                    }else{
                        if(subBlo[i] != null){
                            if(subBlo[i].style.display === "flex"){
                                
                                subBlo[i].style.display = "none";
                            }else{
                                subBlo[i].style.display = "flex";
                                
                            }
                        }
                    
                    }

                }


            });
        }

    }
    fecha();
});

