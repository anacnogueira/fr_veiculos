<?php
class VehiclePhoto extends AppModel {
  public $name = 'VehiclePhoto';

  /* Definir relacionamentos */
  public $belongsTo= array(
    'Vehicle' => array('foreignKey' =>  'vehicle_id')
  );

  public $validate = array();

}
?>
