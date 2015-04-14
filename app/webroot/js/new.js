$(document).ready(function(){
  
  $(".new_brand").fancybox({
    'type':'iframe',
    'autoScale': true,
    'width':1000,
    'height': 50
  });

  $(".new_modelo").fancybox({
    'type':'iframe',
    'autoScale': true,
    'width':1000,
    'height': 450
  });

  
   //Enviar form Marca
  $("#BrandForm").bind("submit", function() { ajaxSendForm( $(this) ) });
 
  //Enviar form de modelo
  $("#ModeloForm").bind("submit", function() { ajaxSendForm( $(this) ) });


});

function ajaxSendForm(form){
  $.fancybox.showActivity();
    $.ajax({
      type		: "POST",
      cache	: false,
      url		: form.attr('action'),
      data		: form.serializeArray(),
      success: function(data) {}    
    });
    return false;
}  