/*
'##################################################################################################'
'#                                       CLASS: Item		                                        																																    #'
'##################################################################################################'
*/	

function Item(){
	this.id = 0;
	this.item = '';
	this.opcao = '';
}

/*
'##################################################################################################'
'#                                       CLASS: ItemColecao                                  																																    #'
'##################################################################################################'
*/		

function ItemColecao(){
	this.colecao = new Array();
	this.uniqueID = 0;
}

ItemColecao.prototype.Adicionar = function(objItem){
  
	objItem.id = this.uniqueID;
	this.uniqueID++;
	return this.colecao.push(objItem);
	alert('Adicionei');
}

ItemColecao.prototype.Remover = function(indice){
	this.colecao.splice(indice,1);
}

ItemColecao.prototype.length = function(){
	return this.colecao.length;
}

ItemColecao.prototype.getItem = function(index){
	return this.colecao[index];
}

ItemColecao.prototype.setItem = function(index, Atributo){
	this.colecao[index] = Atributo;
}



ItemColecao.prototype.getIndexById = function(id){
	for(var indx=0;indx<this.length();indx++){
	    if(parseInt(id,10) == parseInt(this.getItem(indx).id,10)){
			return indx;
		}
	} 
	
}

ItemColecao.prototype.RemoverTodos = function(){
	this.colecao = this.colecao.splice(0);
}