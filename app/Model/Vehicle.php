<?php
class Vehicle extends AppModel {
  public $name = 'Vehicle';

  public $allItems = array();

  /* Definir relacionamentos */
   public $belongsTo = array(
		'Type' => array('foreignKey' => 'type_id'),
    'Category' => array('foreignKey' => 'category_id'),
    'Modelo' => array('foreignKey' => 'modelo_id')
	);
  public $hasMany = array(
    'VehicleItemValue' => array('foreignKey' => 'vehicle_id'),
    'VehiclePhoto' => array('foreignKey' => 'vehicle_id'),
  );
  public $validate = array(
   'name' => array(
    'rule' => 'notEmpty',
    'required' => true,
    'message' => 'Informe o nome do carro'
   ),
   'plate' => array(
    'rule' => 'notEmpty',
    'required' => true,
    'message' => 'Informe a placa do carro'
   ),
   'type_id' => array(
      'rule' =>array('comparison', '>', 0),
      'required' => true,
      'message' => 'Selecione o tipo do veículo'
   ),
   'category_id' => array(
      'rule' => array('comparison', '>', 0),
      'required' => true,
      'message' => 'Selecione a categoria do veículo'
   ),
   'brand_id' => array(
     'rule' => array('comparison', '>', 0),
     'required' => true,
     'message' => 'Selecione a marca do veículo'
   ),
   'modelo_id' => array(
      'rule' => array('comparison', '>', 0),
      'required' => true,
       'message' => 'Selecione o modelo do veículo'
   ),
   'manufacturing_year' => array(
      'rule'=>'/^[0-9]{4}$/',
      'message'=>'Insira um ano válido com 4 digitos'

   ),
   'model_year' => array(
      'rule'=>'/^[0-9]{4}$/',
      'message'=>'Insira um ano válido com 4 digitos'
   ),
  /* 'kilometrage' => array(
      'rule'=>'numeric',
      'message'=>'Insira a kilometragem apenas com numeros'
   ),*/
   'price' => array(
      'rule'=>array('money'),
      'required'=>true,
      'message'=>'Informe o preço do veículo'
   ),
   'ativo' => array(
    'rule'=>array('inList', array('S', 'N')),
     'message'=>'Informe o status do veículo'
   )
  );

  public function naoVazio($field=array()){
    foreach( $field as $key => $value ){

      if($key == 'type_id'){

        if(!empty($value))
          return true;

        return false;
      }
    }
  }
}
?>
