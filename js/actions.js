$(document).on('ready',function(){  
     $("#btn-guardar").click(function(){
     var url = "registro.php"; // El script a dónde se realizará la petición.
        $.ajax({
               type: "POST",
               url: url,
               data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
               }
             });

        return false; // Evitar ejecutar el submit del formulario.
     });
    });