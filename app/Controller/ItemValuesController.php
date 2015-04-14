<?php
  class ItemValuesController extends AppController{

     public $name = 'ItemValues';

     /* Área restrita */
     public function admin_index(){
      $this->ItemValue->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['ItemValue']['qtde'];

      //Item selecionado
      if(!empty($this->data['ItemValue']['item_id'])){
        $conditions['item_id'] = $this->data['ItemValue']['item'].'%';
      }

      //Nome do item (valor)
       if(!empty($this->data['ItemValue']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['ItemValue']['name'].'%';
      }

      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('ItemValue.*','Item.*'));

      $item_values = $this->paginate('ItemValue');
      $count = $this->ItemValue->find('count',array('conditions'=>$conditions));
      $items = $this->ItemValue->Item->find('list',array('order'=>'Item.name'));
      $items[0] = "Todos";
      ksort($items);

      $this->set(compact('item_values','count','items'));
     }

      public function admin_add(){
      $this->set("title_for_layout","Opcional valores &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->ItemValue->create();

        if ($this->ItemValue->save($this->data)) {
            $this->Session->setFlash(__('Valor do opcional criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao valor do opcional
         //$this->Session->setFlash(__('Não foi possível cadastrar vaor do opcional. Por favor,
         //contacte o administrador do site.', true));
        }
      }
      $items = $this->ItemValue->Item->find('list');
      $this->set(compact('items'));
     }

     public function admin_edit($id = null){
      $this->set("title_for_layout","Opcional valores &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Valor Inválido', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->ItemValue->save($this->data)) {
				  $this->Session->setFlash(__('O valor foi salvo.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar valor do popcional.', true));
          //$this->redirect(array('controller'=>'item_values','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->ItemValue->read(null, $id);
		  }

      $items = $this->ItemValue->Item->find('list');
      $this->set(compact('items'));
     }

     public function admin_view($id=null){
      $this->set("title_for_layout","Opcional valor &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Valor Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }
      $value =  $this->ItemValue->read(null, $id);
      $this->set(compact('value'));
     }

      public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Valor Inválido', true));
          $this->redirect(array("action" => "index"));
		    }
		  if ($this->ItemValue->delete($id)) {
			  $this->flash(__('Valor excluído', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
		  }
     }
    
   }
?>
