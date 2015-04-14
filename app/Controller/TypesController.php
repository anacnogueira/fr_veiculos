<?php
  class TypesController extends AppController{

     public $name = 'Types';

   public function admin_index(){
      $this->Type->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['Type']['qtde'];

      if(!empty($this->data['Type']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Type']['name'].'%';
      }

      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('Type.*'));

      $types = $this->paginate('Type');
      $count = $this->Type->find('count',array('conditions'=>$conditions));

      $this->set(compact('types','count'));
     }

     public function admin_add(){

      $this->set("title_for_layout","Tipos &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->Type->create();

        if ($this->Type->save($this->data)) {
            $this->Session->setFlash(__('Tipo de veículo criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao cadastrar categoria
         //$this->Session->setFlash(__('Não foi possível cadastrar categoria. Por favor,
         //contacte o administrador do site.', true));
        }
      }
     }

     public function admin_edit($id = null){

      $this->set("title_for_layout","Tipos &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Tipo Inválido', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->Type->save($this->data)) {
				  $this->Session->setFlash(__('O tipo foi salvo.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar usuário.', true));
          //$this->redirect(array('controller'=>'usuarios','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->Type->read(null, $id);
		  }
     }

     public function admin_view($id=null){
      $this->set("title_for_layout","Tipos &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Tipo Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }
      $type =  $this->Type->read(null, $id);
      $this->set(compact('type'));
     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Tipo Inválido', true));
          $this->redirect(array("action" => "index"));
		    }
		  if ($this->Type->delete($id)) {
			  $this->flash(__('Tipo excluído', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
		  }
     }

   }
?>
