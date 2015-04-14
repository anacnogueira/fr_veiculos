<?php
  class VehicleItemValuesController extends AppController{

     public $name = 'VehicleItemValues';

     /* Área restrita */
     public function admin_index(){
         $veiculo_item_valores = $this->VehicleItemValue->find('all');
         $this->set(compact('veiculo_item_valores'));
     }


     public function admin_add(){
     }

     public function admin_edit($id = null){


     }

     public function admin_view($id = null){

     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Item Inválido', true));
          $this->redirect(array("action" => "admin_index"));
		    }
		  if ($this->VeículoItemValor->delete($id)) {
			  $this->flash(__('Item excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
     }

   }
?>
