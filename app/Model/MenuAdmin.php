<?php
class MenuAdmin extends AppModel {
	public $name = 'MenuAdmin';

  public $validate = array(
    'nome' => array(
      'rule' => 'notEmpty',
      'required' => true,
      'message' => 'Informe o nome do item'      
     ),
     'link' => array(
      'rule' => 'notEmpty',
      'required' => true,
      'message' => 'Informe o link do item'      
     ),
     'order' => array(
      'rule' => 'notEmpty',
      'required' => true,
      'message' => 'Informe a ordem do item no menu'      
     ),
     'ativo'=>array(
      'rule'=>array('inList', array('S', 'N')),
      'message'=>'Informe o status do item'
    ));
}
?>