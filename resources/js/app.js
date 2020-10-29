require('./bootstrap');

setInterval(function(){
    if(document.getElementById("success")){
        setTimeout(function(){
            document.getElementById("success").style.display = "none";
        }, 2000);
    }


    if(document.getElementById("error")){
        setTimeout(function(){
           document.getElementById("error").style.display = "none";
           
        }, 2000);
    }
    
}, 1000);

