<?php
class Category extends AppModel {
  public $name = 'Category';

   public $validate = array(
     'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe o  nome da categoria'));

}
?>
