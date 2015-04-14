<?php
  class ModelosController extends AppController{

     public $name = 'Modelos';

     /* Área restrita */
     public function admin_index(){
      $this->Modelo->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['Modelo']['qtde'];

      //Marca
      if(!empty($this->data['Modelo']['brand_id'])){
        $conditions['brand_id'] = $this->data['Modelo']['brand_id'];
      }

      //Modelo
       if(!empty($this->data['Modelo']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Modelo']['name'].'%';
      }

      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('Modelo.*','Brand.*'));

      $modelos = $this->paginate('Modelo');
      $count = $this->Modelo->find('count',array('conditions'=>$conditions));
      $brands = $this->Modelo->Brand->find('list',array('order'=>'Brand.name'));
      $items[0] = "Todos";
      ksort($brands);

      $this->set(compact('modelos','count','brands'));
     }

      public function admin_add(){
      $this->set("title_for_layout","Modelos &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->Modelo->create();

        if ($this->Modelo->save($this->data)) {
            $this->Session->setFlash(__('Modelo criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao valor do modelo
         //$this->Session->setFlash(__('Não foi possível cadastrar modelo. Por favor,
         //contacte o administrador do site.', true));
        }
      }
      $brands = $this->Modelo->Brand->find('list',array('order'=>'Brand.name'));
      $brands[0] = "Selecione...";
      ksort($brands);
      $this->set(compact('brands'));
     }

     public function admin_edit($id = null){
      $this->set("title_for_layout","Modelos &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Modelo Inválido', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->Modelo->save($this->data)) {
				  $this->Session->setFlash(__('O modelo foi salvo.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar modelo.', true));
          //$this->redirect(array('controller'=>'modelos','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->Modelo->read(null, $id);
		  }

      $brands = $this->Modelo->Brand->find('list');
      $this->set(compact('brands'));
     }

     public function admin_view($id=null){
      $this->set("title_for_layout","Modelo &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Modelo Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }
      $value =  $this->ItemValue->read(null, $id);
      $this->set(compact('value'));
     }

      public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Modelo Inválido', true));
          $this->redirect(array("action" => "index"));
		    }
		  if ($this->Modelo->delete($id)) {
			  $this->flash(__('Modelo excluído', true), array('action'=>'index'));
        $this->redirect(array("action" => "index"));
		  }
     }

         /* Cadastro externo */
    function admin_ext_add($table,$data){
        $this->data = $data;
        if (isset($this->data)) {

            $this->$table->Modelo->set($this->data);
            if ($this->$table->Modelo->validates()) {
                $this->$table->Modelo->create(true);
                if($this->$table->Modelo->save($this->data)){
                    $id = $this->$table->Modelo->id;

                    //Recuperar ultimo Modelo cadastrado
                    $modelo = $this->$table->Modelo->find('first',array(
                        'conditions'=>array('Modelo.id'=>$id),
                        'recursive'=>-1));

                    if(!$modelo)
                        $out =  "Erro: Nenhum modelo encontrado";
                    else{
                        $out = "<script>
                        parent.$('#VehicleModeloId').append('<option value=\"". $modelo['Modelo']['id']. "\" selected=\"selected\">" . $modelo['Modelo']['name'] ."</option>');

                        //self.parent.location.reload();
                        parent.$.fancybox.close();
                     </script>";
                    }
                    echo $out;
                    //return $out;
                }
            }
        }
    }
    
   }
?>
