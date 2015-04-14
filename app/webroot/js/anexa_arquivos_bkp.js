$(document).ready(function(){
   //Anexar Multiplas imagens
   qtde = 1;

  if(!empty($("#VehiclePhoto"))){

    new AjaxUpload('VehiclePhoto', {
			action: URL + 'vehicles/manager_files',
      data: {vehicle_id: $("#VehicleId").val()},
      name: 'photo',
      onComplete : function(file,response){
         
        if(response.match("Erro")){
          $('div#flashMessage').html(response.replace('Erro:',''));
          return false;
        }
        else{
          link = "<a href='" + URL + "img/vehicles/" + response + "' class='imagem iframe.fancybox'>";
          image = "<img src='" + URL + "img/vehicles/" + response + "' alt='' class='' /><br />";
          hidden = "<input name='data[VehiclePhoto][photo][]' type='hidden' value='" + response + "' />";
          button = "<button type='submit' class='btn_delete'>Excluir</button>";
          $('<div class="box">' + link  + image + hidden +  button + '<a/></div>').appendTo($('div#list_images'));
        }
			}
		});

   $('.btn_delete').live("click",function(){
    delete_image($(this));
   });
  }

  function delete_image(obj){
    file = $(obj).prev(0).val();
    linha   = $(obj).parent();

    linha.hide('slow').remove().stop();

	  $.ajax({
      type: "POST",
      url: url + 'vehicles/delete_file/' + file,
      async: false,
      success: function(text) {
        //alert(text)
      }
	  });
 }

});



function empty(valor){
  if(valor == "" || valor == 0 || valor == null || valor == undefined)
    return true;
  else
    return false;
}