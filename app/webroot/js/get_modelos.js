jQuery(document).ready(function() {
   //get_modelos(jQuery("#VehicleBrandId"),jQuery('#VehicleModeloId'));
   var Brand  = jQuery("#VehicleBrandId") ;

   /*Brand.each(function(){
     //alert('Carregou direto: ' + $(this).val());
     get_modelos($(this).val(), jQuery('#VehicleModeloId'));
   });*/

   Brand.change(function(){
     //alert('Selecionado: ' + $(this).val());
     get_modelos($(this).val(), jQuery('#VehicleModeloId'))
   });
   //jQuery("#VehicleBrandId").change(function)
});
function empty(valor){
    if(valor == "" || valor == 0 || valor == null || valor == undefined)
      return true;
    else
      return false;
  }

function get_modelos(field_brand_val,field_modelo){

    //field_brand.change(function(){

      var brand_sel  = field_brand_val;
      var dropdownSet = field_modelo;

      if(empty(brand_sel)){
        dropdownSet.attr("disabled",true);
        jQuery(dropdownSet).emptySelect();
      }
      else {
        dropdownSet.attr("disabled",false);
        jQuery.ajax({
          type: "GET",
          url: URL + "vehicles/get_modelos/"+ field_brand_val,
          contentType: "application/json; charset=ISO-8859-1",
          dataType: "json",
          success: function(json) {
            //alert(URL + "vehicles/get_modelos/"+ field_brand_val);
            //alert(json);
            jQuery(dropdownSet).loadSelect(json);
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Erro: " + XMLHttpRequest.responseText);
          }
        });
      }
    //});
  }