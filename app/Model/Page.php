<?php
class Page extends AppModel {
  public $name = 'Page';
  var $useTable = false;

   var $_schema = array(
    'name'   =>array('type'=>'string', 'length'=>100),
    'email'		=>array('type'=>'string', 'length'=>255),
    'telephone' => array('type'=>'string','length'=>13),
    'uf' =>array('type'=>'string','lenght'=>2),
    'city'	=>array('type'=>'string', 'length'=>100)
    'brand' =>array('type'=>'string','lenght'=>50),
    'modelo' =>array('type'=>'int','lenght'=>50),
    'manufacturing_year' =>array('type'=>'int','lenght'=>4),
    'model_year' =>array('type'=>'int','lenght'=>4),
    'aditional_informations' =>array('type'=>'text'),
    );
   var $validate = array(
    'name' => array(
      'notEmpty' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe seu nome'
      )
    ),
    'email' => array(
      'email' => array(
      'rule' => 'email',
      'message' => 'Endereço de e-mail inválido'
      ),
      'notEmpty' => array(
        'rule' => 'notEmpty',
        'message' => 'Informe seu e-mail'
      )
    ),
    /*'telephoone' => array(
      'custom' => array(
       'rule' => array('custom', '/^\([0-9]{2}\)[0-9]{4}-[0-9]{4}$/'),
       'message' => 'Informe o telefone corretamente')
      ),*/
    'uf' => array(
      'custom' => array(
       'rule' => array('naoVazio'),
       'message' => 'Selecione o estado')
      ),
    'city'=>array(
      'rule'=>'notEmpty',
      'required'=>true,
      'message'=>'Informe a cidade'
    )

}
?>
