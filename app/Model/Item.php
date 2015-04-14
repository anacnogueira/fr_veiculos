<?php
class Item extends AppModel {
  public $name = 'Item';
   public $hasMany = array(
		'ItemValue' => array('foreignKey' => 'item_id'),
	);
  public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe o nome do opcional'));

}
?>
