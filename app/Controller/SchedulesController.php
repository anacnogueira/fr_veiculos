<?php
  Class SchedulesController extends AppController{
     public $name = 'Schedules';

     /* Área restrita */
     public function admin_index(){
       $qtde =array('10','20','30','50','100');
       //Filtrar condições
       $conditions = array();
       if(empty($this->data))
          $index_qtde = 1;
      else
        $index_qtde  = $this->data['Schedule']['qtde'];

      if(!empty($this->data['Schedule']['name'])){
        $conditions['name LIKE'] = '%'.$this->data['Schedule']['name'].'%';
      }

       //Settings
       $this->paginate = array(
      'limit'=>$this->qtde[$index_qtde],
      'conditions' => array($conditions),
      );
      $schedules = $this->paginate('Schedule');

      for($i=0;$i<count($schedules);$i++){
        $schedules[$i]['Schedule']['date'] = parent::format_date($schedules[$i]['Schedule']['date'],1);
      }
      $this->set(compact('schedules','qtde'));
     }


     public function admin_add(){
     }

     public function admin_edit($id = null){


     }

     public function admin_view($id = null){
       $this->set("title_for_layout","Agendamento &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Agendamento Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }
      $schedule =  $this->Schedule->read(null, $id);
      $schedule['Schedule']['date'] = parent::format_date($schedule['Schedule']['date'],1);
      $schedule['Schedule']['hour'] = substr($schedule['Schedule']['hour'],0,5);
      $schedule['Schedule']['created'] = parent::format_date($schedule['Schedule']['created'],4);
      $schedule['Schedule']['modified'] = parent::format_date($schedule['Schedule']['modified'],4);
		  $this->set(compact('schedule'));
     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Agendamento Inválido', true));
          $this->redirect(array("action" => "admin_index"));
		    }
		  if ($this->Agendamento->delete($id)) {
			  $this->flash(__('Agendamento excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
     }

     /* Site */
     public function index(){}
   }
?>
