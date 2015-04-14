$(document).ready(function(){
//Mascaras de campo

//Data
 if($("input.data").val() != undefined) {
    $("input.data").mask("99/99/9999");
  }

 //Hora
 if($("input.hora").val() != undefined) {
    $("input.hora").mask("99:99");
  }

//Telefone
  if($("input.telefone").val() != undefined) {
    $("input.telefone").mask("(99)9999-9999");
  }

  //CPF
   if($("input.cpf").val() != undefined) {
    $("input.cpf").mask("999.999.999-99");
  }
  
  //CNPJ
 if($("input.cnpj").val() != undefined) {
    $("input.cnpj").mask("99.999.999/9999-99");
  }  
  //Formatar CEP
  if($("input.cep").val() != undefined) {
    $("input.cep").mask("99999-999");
  }

  //Formatar campo valor
  if($("input.valor").val() != undefined || $("input.valor").val() != null) {
    $("input.valor").priceFormat({
       prefix: '',
       centsSeparator: ',',
       thousandsSeparator: '.',
       limit: $(this).attr("maxlength"),
       centsLimit: 2
     });
   }

  //Somente números
  if($("input.onlyNumbers").val() != undefined){
   $("input.onlyNumbers").numeric();
  }
});