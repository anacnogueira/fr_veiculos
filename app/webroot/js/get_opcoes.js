jQuery(document).ready(function() {
   get_opcoes(jQuery("#ItemName"),jQuery('#ItemValueName'));
});
function empty(valor){
    if(valor == "" || valor == 0 || valor == null || valor == undefined)
      return true;
    else
      return false;
  }

function get_opcoes(field_item,field_opcao){

    field_item.change(function(){

      var item_sel  = jQuery(this).val();
      var dropdownSet = field_opcao;

      if(empty(item_sel)){
        dropdownSet.attr("disabled",true);
        jQuery(dropdownSet).emptySelect();
      }
      else {
        dropdownSet.attr("disabled",false);
        jQuery.ajax({
          type: "GET",
          url: URL + "vehicles/get_opcoes/"+ item_sel,
          contentType: "application/json; charset=ISO-8859-1",
          dataType: "json",
          success: function(json) {
            //alert(json);
            jQuery(dropdownSet).loadSelect(json);
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Erro: " + XMLHttpRequest.responseText);
          }
        });
      }
    });
  }