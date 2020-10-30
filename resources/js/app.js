require('./bootstrap');


//Checks if alert message is active and removes it from page after 3 seconds

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

