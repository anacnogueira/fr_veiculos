$(document).ready(function(){
   //Anexar Multiplas imagens
   var qtde = 1;

  if(!empty($("#VehiclePhoto"))){

    new AjaxUpload('VehiclePhoto', {
			action: URL + 'vehicles/manager_files',
      data: {qtde: qtde},
      name: 'photo',
      onComplete : function(file,response){

        if(response.match("Erro")){
          $('div#flashMessage').html(response.replace('Erro:',''));
          return false;
        }
        else{
          files = response.split(",");
          name_ori = files[0];
          name_redim = files[1];

          qtde++;
          link = "<a href='" + URL + "img/vehicles/" + name_ori + "' class='imagem iframe.fancybox'>\n";
          image = "<img src='" + URL + "img/vehicles/" + name_redim + "' alt='' class='' /><a/><br />\n";
          hidden = "<input name='data[VehiclePhoto][" + qtde + "][photo_ori]' type='hidden' value='" + name_ori + "' />\n";
          hidden += "<input name='data[VehiclePhoto][" + qtde + "][photo_redim]' type='hidden' value='" + name_redim + "' />\n";
          button = "<button type='button' class='btn_delete'>Excluir</button>";
          $('<div class="box">' + link  + image + hidden +  button + '</div>').appendTo($('div#list_images'));
        }
			}
		});

   $('.btn_delete').live("click",function(){
    delete_image($(this));
    return false;
   });
  }

  function delete_image(obj){
    file_ori = $(obj).prev().prev().val();
    file_redim = $(obj).prev().val();


	  $.ajax({
      type: "POST",
      data: {file_ori: file_ori, file_redim: file_redim},
      url: URL + 'vehicles/delete_file/',
      async: false,
      success: function(response) {
        if(response.match("Erro")){
          $('div#flashMessage').html(response.replace('Erro:',''));
          return false;
        } else {
          linha   = $(obj).parent();
          linha.hide('slow').remove().stop();
          qtde--;
        }
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