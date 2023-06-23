validarEdad();

$(document).on('change', '#nombre', function(event) {
    val=   $(this).children("option:selected").val();
    localStorage.setItem('id_solicitante', val); 
    text=   $(this).children("option:selected").text();
    localStorage.setItem('nombre', text); 

    
});
$(function(){
    $(document).on('change','#nombre',function(){ 
      var value = $(this).val();
    $('#id_del_solicitante').val(value);
    $("#id_solicitant").val(value);
   
    localStorage.setItem('edad',  $('#id_solicitant option:selected').html());
    
  });
});




document.addEventListener("DOMContentLoaded", function() {
    
    var edadValida = localStorage.getItem('edad');
    if (edadValida < 18 ) {
        
        document.getElementById("form_pedido").style.pointerEvents = "none";
        document.getElementById("form_pedido").style.opacity = "0.5";


        document.getElementById("monto_solicitado").style.pointerEvents = "none";
        document.getElementById("monto_solicitado").style.opacity = "0.5";


        document.getElementById("monto_solicitado").style.pointerEvents = "none";
        document.getElementById("monto_solicitado").style.opacity = "0.5";


        document.getElementById("plazo").style.pointerEvents = "none";
        document.getElementById("plazo").style.opacity = "0.5";

        
        alert ("Lo siento no puede realizar en pedido por que eres menor de edad"); 
    }
});


function validarEdad(){
    var edadSeleccionada = localStorage.getItem("edad");
//alert(edadSeleccionada);

    if(edadSeleccionada <= 17){
       
        document.getElementById("monto_solicitado").style.pointerEvents = "none";
        document.getElementById("monto_solicitado").style.opacity = "0.5";


        document.getElementById("monto_solicitado").style.pointerEvents = "none";
        document.getElementById("monto_solicitado").style.opacity = "0.5";


        document.getElementById("plazo").style.pointerEvents = "none";
        document.getElementById("plazo").style.opacity = "0.5";
    }else{
       
        var idSeleccionado = localStorage.getItem("id_solicitante");
        $("#nombre").val(idSeleccionado);

        var edad = localStorage.getItem("edad");
        $("#id_del_solicitante").val(edad);

       
    }



   

   

}

function validarMonto(){

$destino = $('select[id=destino]').val();
$monto_solicitado =  $("#monto_solicitado").val();

    if($destino === "Casa" && $monto_solicitado > 200000) {
     alert("El monto máximo para este destino son $200,000");
     $('#monto_solicitado').attr('max', 200000);
     return false;
    }else if($destino === "Auto" && $monto_solicitado > 100000) {
        alert("El monto máximo para este destino son $100,000")
        $('#monto_solicitado').attr('max', 100000);
        return false;
    }else if($destino === "Prestamo" && $monto_solicitado > 50000) {
        alert("El monto máximo para este destino son $50,000");
        $('#monto_solicitado').attr('max', 50000);
        return false;
    }else if($destino === "Tarjeta" && $monto_solicitado > 20000) {
        alert("El monto máximo para este destino son $20,000");
        $('#monto_solicitado').attr('max', 20000);
        return false;
       }

}





	






  $(document).ready(function() {
      $('#destino').change(function() {
        var opcionSeleccionada = $(this).val();

        if (opcionSeleccionada === 'Casa') {
            
           // alert("hola");
           // 
           

            
        } else if (opcionSeleccionada === 'Auto') {
            /*$('#monto_solicitado').attr('max', 100000);
            $('#monto_solicitado').val('100000');
            alert("auto");*/
        }
        else if(opcionSeleccionada==="Prestamo"){
            /*alert("pres");
            $('#monto_solicitado').attr('max', 50000);
            
            $('#monto_solicitado').val('50000');*/
        }
        else if(opcionSeleccionada==="Tarjeta"){
           /* alert("tarejta c");
            $('#monto_solicitado').attr('max', 20000);
            $('#monto_solicitado').val('20000');*/
        }
      });
    });



