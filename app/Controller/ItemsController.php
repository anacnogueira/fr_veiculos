<?php
  class ItemsController extends AppController{

     public $name = 'Items';

     /* Área restrita */
      public function admin_index(){
      $this->Item->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['Item']['qtde'];

      if(!empty($this->data['Item']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Item']['name'].'%';
      }

      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('Item.*'));

      $items = $this->paginate('Item');
      $count = $this->Item->find('count',array('conditions'=>$conditions));

      $this->set(compact('items','count'));
     }


      public function admin_add(){

      $this->set("title_for_layout","Opcionais &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->Item->create();

        if ($this->Item->save($this->data)) {
            $this->Session->setFlash(__('Opcional criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao cadastrar opcional
         //$this->Session->setFlash(__('Não foi possível cadastrar opcional. Por favor,
         //contacte o administrador do site.', true));
        }
      }
     }

     public function admin_edit($id = null){
      $this->set("title_for_layout","Opcionais &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Opcional Inválido', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->Item->save($this->data)) {
				  $this->Session->setFlash(__('O opcional foi salvo.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar opcional.', true));
          //$this->redirect(array('controller'=>'items','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->Item->read(null, $id);
		  }
     }

     public function admin_view($id=null){
      $this->set("title_for_layout","opcionais &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('opcional Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }
      $item =  $this->Item->read(null, $id);
      $this->set(compact('item'));
     }

      public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Opcional Inválido', true));
          $this->redirect(array("action" => "index"));
		    }
		  if ($this->Item->delete($id)) {
			  $this->flash(__('Opcional excluído', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
		  }
     }
   }
?>