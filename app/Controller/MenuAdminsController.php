<?php
  class MenuAdminsController extends AppController{
    public $name = "menu_admins";
    public $helpers = array('Status');
       
    /* ADMIN */
    function admin_index(){   
      $this->set("title_for_layout","Menu");
      
      $this->MenuAdmin->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['MenuAdmin']['qtde'];

      if(!empty($this->data['MenuAdmin']['nome'])){
        $conditions['nome LIKE'] = '%'.$this->data['MenuAdmin']['nome'].'%';
      }
      if(!empty($this->data['MenuAdmin']['ativo'])){
        $conditions['ativo'] = $this->data['MenuAdmin']['ativo'];
      }
      
      $this->paginate = array(
        'conditions' => $conditions,
        'limit'=>$this->qtde[$index_qtde]
      );
      
      $items = $this->paginate('MenuAdmin');
      $count = $this->MenuAdmin->find('count',array('conditions'=>$conditions));
      $this->set(compact('items', 'count'));
 
    }
    function admin_view($id = null){
      $this->set("title_for_layout","Menu &raquo; Visualizar");
      
      if (!$id) {
			  $this->Session->setFlash(__('Item Inválido', true));
        $this->redirect(array('controller'=>'menu_admins','action'=>'admin_index'));
		  }
      $item =  $this->MenuAdmin->read(null, $id);
		  $this->set(compact('item'));
    }

    function admin_add(){
      $this->layout = "admin";
      $this->set("title_for_layout","Menu &raquo; Cadastrar");
      
      if (!empty($this->data)) {
        $this->MenuAdmin->create();
        if ($this->MenuAdmin->save($this->data)) {
          $this->Session->setFlash(__('Item criado com sucesso.', true));
          $this->redirect(array("action" => "admin_index"));
			  } else {
          //Erro ao cadastrar item
          //$this->Session->setFlash(__('Não foi possível cadastrar item. Por favor,
           // contacte o administrador do site.', true));
        }
      }
    }
    
    function admin_edit($id = null){
      $this->layout = "admin";
      $this->set("title_for_layout","Menu &raquo; Editar");
      
      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Item Inválido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if (!empty($this->data)) {
        if ($this->MenuAdmin->save($this->data)) {
				  $this->Session->setFlash(__('O item foi salvo.', true));
          $this->redirect(array('controller'=>'menu_admins','action'=>'admin_index'));
			  } else {
          $this->Session->setFlash(__('Não foi possível editar item.', true));
          $this->redirect(array('controller'=>'menu_admins','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->MenuAdmin->read(null, $id);       
		  }
    }
    function admin_delete($id = null){
      if (!$id) {
			  $this->Session->setFlash(__('Item Invalido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if ($this->MenuAdmin->delete($id)) {
			  $this->flash(__('Item excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
    }
  }
?>
