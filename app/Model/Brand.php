<?php
class Brand extends AppModel {
  public $name = 'Brand'; 

   public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'message' => 'Informe o  nome da marca'));

  public function beforeSave() 	{  return true;  	}

}
?>
