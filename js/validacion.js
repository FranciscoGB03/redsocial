function comprobacion(){
    var letras=/[a-zA-Z]/;
    var matricula=document.getElementById('matricula').value;
    var longitud=matricula.length;         
    if(longitud!=8){
        alert('El numero de matricula debe contener 8 caracteres numéricos');
        return false;
    }else if(letras.test(matricula)){
        alert('la matricula solo debe contener números');
        return false;
    }
    /*validacion de la contraseña*/    
    var clave1=document.getElementById('passwd').value;
    var clave2=document.getElementById('passwdcon').value;   
    if(clave1.length<8 || clave1.length>15){
        alert('la contraseña debe contener entre 8 y 15 caracteres');
        return false;
    }else if(clave1===clave2){    	
        return true;        
    }else{
        alert('las contraseñas deben coincidir.');
        document.getElementById('passwd').value="";
        document.getElementById('passwdcon').value="";
        return false;
    }
}