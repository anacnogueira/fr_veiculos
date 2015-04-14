<?php
class ItemValue extends AppModel {
  public $name = 'ItemValue';
  public $belongsTo = array(
		'Item' => array('foreignKey' => 'item_id'),
	);
  public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe o nome do opcional'),
      'item_id' =>array(
        'rule' => array('comparison', '>', 0),
        'required' => true,
        'message' => 'Selecione o item'

      )
  );

}
?>
