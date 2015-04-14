<?php
  class VehiclePhotodController extends AppController{

     public $name = 'VehiclePhotos';

     /* Área restrita */
     public function admin_index(){
         $veiculo_fotos = $this->VeiculoFotos->find('all');
         $this->set(compact('veiculo_fotos'));
     }


     public function admin_add(){
     }

     public function admin_edit($id = null){


     }

     public function admin_view($id = null){

     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Foto de veículo Inválida', true));
          $this->redirect(array("action" => "admin_index"));
		    }
		  if ($this->VeículoFoto->delete($id)) {
			  $this->flash(__('Foto de veículo excluída', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
     }

   }
?>
