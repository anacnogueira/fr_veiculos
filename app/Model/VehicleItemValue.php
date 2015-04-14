<?php
class VehicleItemValue extends AppModel {
  public $name = 'VehicleItemValue';

  /* Definir relacionamentos */
  public $belongsTo = array(
		'Vehicle' => array('foreignKey' => 'vehicle_id'),
    'Item' => array('foreignKey' => 'item_id'),
    'ItemValue' => array('foreignKey' => 'item_value_id'),
	);


  public $validate = array();

}
?>
