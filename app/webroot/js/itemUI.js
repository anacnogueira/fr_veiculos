/*
'##################################################################################################'
'#  			Classe:      ItemUI                                                                 #'
'																							                                                    #'
'##################################################################################################'
*/
function ItemUI() {
	this.form	= null;
	this.item = "";
	this.opcao = "";
	this.objItemColecao	= new ItemColecao();
}

/*
'##################################################################################################'
'#                                       Método: TotalAdicionados                                        																															#'
'##################################################################################################'
*/
ItemUI.prototype.TotalAdicionados = function(){
	return this.objItemColecao.length();
}

/*
'##################################################################################################'
'#                                       Método: Adicionar                                        #'
'##################################################################################################'
*/
ItemUI.prototype.Adicionar = function(){

	var item_name  = $('#ItemName');
	var opcao_name  = $('#ItemValueName');

	var item = "";

  if(item_name.val() == 0){
    alert('Selecione o item');
    item_name.focus();
    return false;
  }

  if(opcao_name.val() == 0 || opcao_name.val() == ''){
    alert('Selecione a opção do item');
    opcao_name.focus();
    return false;
  }
	
	var objeItem = new Item();
	var UniqueID = this.objItemColecao.uniqueID++;

  with(objeItem){
    item = item_name.val();
    opcao  = opcao_name.val();
	}

	this.objItemColecao.Adicionar(objeItem);
	
	item  = "<tr>";
	item +=  "<td><input type='checkbox' class='checkboxRemove' name='checkboxItem[]' value='" + UniqueID +"' /></td>";
	item +=    "<td>" + item_name.children(':selected').text() + "</td>";
	item +=    "<td>" + opcao_name.children(':selected').text() + "</td>";
	item +=  "</tr>";
	
  $("#tbl_itens").append(item);
	
	this.LimparCampos();
}

/*
'##################################################################################################'
'#                                       Método: Editar																																		                                         #'
'##################################################################################################'
*/

ItemUI.prototype.Editar = function(){
  
	var objItemID = $("[name='checkboxItem[]']");
	

	if(objItemID == null) return;

    if(objItemID.filter(":checked").length == 0){
      alert("Selecione um item para editar.");
      return;
    }
	 
    if(objItemID.filter(":checked").length > 1){
      alert("Selecione apenas um item para editar.");
      return;
    }
	
    objItem = this.objItemColecao.getItem(this.objItemColecao.getIndexById(objItemID.filter(":checked").val()));
	
	$('#ItemName').val(objItem.item);
  $('#ItemValueName').val(objItem.opcao);

	this.Remover();
	
}

/*
'##################################################################################################'
'#                                       Método: Remover																																		                                         #'
'##################################################################################################'
*/

ItemUI.prototype.Remover = function(){
	var objItemID = $("[name='checkboxItem[]']");
	if(objItemID == null) return;
	
	if(objItemID.filter(":checked").length == 0){
		alert("Selecione no minimo um item para remover.");
		return;
  }
	 
	 
	 colecao = this.objItemColecao;
	 objItemID.filter(":checked").each(function(){
	    if($(this).val() != 'on'){
			$(this).parent().parent().remove();
			colecao.Remover(colecao.getIndexById($(this).val()));
		}	
		$(this).attr("checked",false);
	 });
}


/*
'##################################################################################################'
'#                                       Método: LimparCampos																																                                         #'
'##################################################################################################'
*/

ItemUI.prototype.LimparCampos = function(){
    
	jQuery("fieldset").find(":input").each(function(){
	  switch(this.type) {
		case 'select-one':
		case 'text':
	    case 'textarea':
	        jQuery(this).val('');
	        break;
	  }
	});
}


/*
'##################################################################################################'
'#                                       Método: Processar																																	                                         #'
'##################################################################################################'
*/

ItemUI.prototype.Processar = function(){
	all_items = $("#VehicleAllItems");
	all_items.val('');
	var valor = '';
	for(indx=0;indx< this.objItemColecao.length();indx++){
		objeItem = this.objItemColecao.getItem(indx);
		
		valor += '[campo]'+  objeItem.item;
		valor += '[campo]'+  objeItem.opcao;

		if(indx<this.objItemColecao.length()-1)
			valor += '[item]';
	}
	all_items.val(valor);
}






/*'##################################################################################################'
'#                                       Método: ReloadFromText																															                                         #'
'##################################################################################################'
*/

ItemUI.prototype.ReloadFromText = function(text){
	var arraitems, arraItemsCampos

	if(text != ""){
		arraItems = text.split("[item]");
		for(var indx=0;indx< arraItems.length;indx++){
      if(arraItems[indx] != ''){
        arraItemCampos = arraItems[indx].split("[campo]");
        var objeItem = new Item();
	      var UniqueID = this.objItemColecao.uniqueID;

        with(objeItem){
          item = arraItemCampos[1];
          opcao  = arraItemCampos[2];
	      }

	this.objItemColecao.Adicionar(objeItem);


      }
		}
	}
}












/*
'##################################################################################################'
'#                                       Método: ReloadFromText																															                                         #'
'##################################################################################################'
*/

/*ItemUI.prototype.ReloadFromText = function(text){
	var arraitems, arraItemsCampos

	if(text != ""){
		arraItems = text.split("[item]");
		for(var indx=0;indx< arraItems.length;indx++){
      if(arraItems[indx] != ''){
        arraItemCampos = arraItems[indx].split("[campo]");
        $("#ItemName").val(arraItemCampos[1]);
        $("#ItemValueName").val(arraItemCampos[2]);
        this.Adicionar();
      }
		}
	}
}*/