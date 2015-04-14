<?php
class Modelo extends AppModel {
  public $name = 'Modelo';
  public $belongsTo = array(
		'Brand' => array('foreignKey' => 'brand_id')
	);

   public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe o nome do modelo'),
      'brand_id' =>array(
        'rule' => array('comparison', '>', 0),
        'required' => true,
        'message' => 'Selecione a marca'

      )
  );

}
?>
