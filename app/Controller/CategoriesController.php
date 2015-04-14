<?php
  Class CategoriesController extends AppController{
     public $name = 'Categories';

     public function admin_index(){
      $this->Category->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['Category']['qtde'];

      if(!empty($this->data['Category']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Category']['name'].'%';
      }

      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('Category.*'));

      $categories = $this->paginate('Category');
      $count = $this->Category->find('count',array('conditions'=>$conditions));


      $this->set(compact('categories','count'));
     }

     public function admin_add(){

      $this->set("title_for_layout","Categorias &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->Category->create();

        if ($this->Category->save($this->data)) {
            $this->Session->setFlash(__('Categoria criada com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao cadastrar categoria
         //$this->Session->setFlash(__('Não foi possível cadastrar categoria. Por favor,
         //contacte o administrador do site.', true));
        }
      }
     }

     public function admin_edit($id = null){

      $this->set("title_for_layout","Categorias &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Categoria Inválida', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->Category->save($this->data)) {
				  $this->Session->setFlash(__('A categoria foi salva.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar usuário.', true));
          //$this->redirect(array('controller'=>'usuarios','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->Category->read(null, $id);
		  }
     }

     public function admin_view($id=null){
      $this->set("title_for_layout","Categorias &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Categoria Inválida', true));
        $this->redirect(array('action'=>'index'));
		  }
      $category =  $this->Category->read(null, $id);
      $this->set(compact('category'));
     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Categoria Inválida', true));
          $this->redirect(array("action" => "index"));
		    }
		  if ($this->Category->delete($id)) {
			  $this->flash(__('Categoria excluída', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
		  }
     }
   }
?>
