<?php
class Type extends AppModel {
  public $name = 'Type';

  public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe o nome do tipo de veículo'));

}
?>
