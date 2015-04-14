$(document).ready(function(){
  $(".new_brand").fancybox({
    'type':'iframe',
    'autoScale': false,
    'width':500,
    'height': 150
  });


  $(".new_modelo").fancybox({
    'type' : 'iframe',
    'href' : URL  + 'admin/vehicles/add_modelo',
    'autoScale': false,
    'width':500,
    'height': 250,
    'ajax' : {
            'type': 'POST',
            'data': {
                'brand_id': $("#VehicleBrandId").val(),
            }
        }

  });

  //Enviar form de Marca
  $("#BrandForm").bind("submit", function() { ajaxSendForm( $(this) ) });
  $("#ModeloForm").bind("submit", function() { ajaxSendForm( $(this) ) });

  //Cadastro de items
  var objeItemUI = new ItemUI();
  $("form").submit(function(){
    objeItemUI.Processar();
    //return false;
  });

  $('.btnAdd').click(function(){

    objeItemUI.Adicionar();
    return false;
  });  

  $('.btnEdit').click(function(){
    objeItemUI.Editar();
    return false;
  });  

  $('.btnDelete').click(function(){
    objeItemUI.Remover();
    return false;
  });  
  
  if($("#VehicleAllItems").val()!= undefined && $("#VehicleAllItems").val()!= '' )
   objeItemUI.ReloadFromText($("#VehicleAllItems").val());
    
});

function ajaxSendForm(form){
  $.fancybox.showActivity();
    $.ajax({
      type		: "POST",
      cache	: false,
      url		: form.attr('action'),
      data		: form.serializeArray(),
      success: function(data) {


      }
    });
    return false;
}