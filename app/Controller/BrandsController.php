<?php
  class BrandsController extends AppController{

     public $name = 'Brands';

     /* Área restrita */
     public function admin_index(){
      $qtde =array('10','20','30','50','100');
       //Filtrar condições
       $conditions = array();
       if(empty($this->data))
          $index_qtde = 1;
      else
        $index_qtde  = $this->data['Brand']['qtde'];

      if(!empty($this->data['Brand']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Brand']['name'].'%';
      }

       //Settings
       $this->paginate = array(
      'limit'=>$this->qtde[$index_qtde],
      'conditions' => array($conditions),
      );
      $brands = $this->paginate('Brand');
      $count = $this->Brand->find('count',array('conditions'=>$conditions));

         $this->set(compact('brands','qtde','count'));
     }


     public function admin_add(){
         $this->set("title_for_layout","Marcas &raquo; Cadastrar");

      if (!empty($this->data)) {
        $this->Brand->set($this->data);
        $this->Brand->create();

        if ($this->Brand->save($this->data)) {
            $this->Session->setFlash(__('Marca criada com sucesso.', true));
            $this->redirect(array("action" => "index"));
			  } else {
         //Erro ao cadastrar marca
         //$this->Session->setFlash(__('Não foi possível cadastrar marca. Por favor,
         //contacte o administrador do site.', true));
        }
      }
     }

     public function admin_edit($id = null){
       $this->set("title_for_layout","Marcas &raquo; Editar");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Marca Inválida', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        if ($this->Brand->save($this->data)) {
				  $this->Session->setFlash(__('A marca foi salva.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar marca.', true));
          //$this->redirect(array('controller'=>'brands','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->Brand->read(null, $id);
		  }

     }

     public function admin_view($id = null){
        $this->set("title_for_layout","Marcas &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Marca Inválida', true));
        $this->redirect(array('action'=>'index'));
		  }
      $brand =  $this->Brand->read(null, $id);
      $this->set(compact('brand'));
     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Marca Inválida', true));
          $this->redirect(array("action" => "admin_index"));
		    }
		  if ($this->Brand->delete($id)) {
			  $this->flash(__('Marca excluída', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
     }

      /* Cadastro externo */
    function admin_ext_add($table,$data){
        $this->data = $data;
        if (isset($this->data)) {

            $this->$table->Modelo->Brand->set($this->data);
            if ($this->$table->Modelo->Brand->validates()) {
                $this->$table->Modelo->Brand->create(true);
                if($this->$table->Modelo->Brand->save($this->data)){
                    $id = $this->$table->Modelo->Brand->id;

                    //Recuperar ultima Marca cadastrada
                    $brand = $this->$table->Modelo->Brand->find('first',array(
                        'conditions'=>array('Brand.id'=>$id),
                        'recursive'=>-1));
                    if(!$brand)
                        $out =  "Erro: Nenhuma marca encontrada";
                    else{
                        $out = "<script>
                        parent.$('#".$table."BrandId').append('<option value=\"". $brand['Brand']['id']. "\" selected=\"selected\">" . $brand['Brand']['name'] ."</option>');
                        self.parent.location.reload()
                        parent.$.fancybox.close();
                        </script>";
                    }
                    echo $out;
                    //return $out;
                }
            }
        }
    }

     public function index(){}
     public function view($id = null){}



   }
?>
