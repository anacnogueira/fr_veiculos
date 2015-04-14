<?php
class Schedule extends AppModel {
  public $name = 'Schedule';
  public $belongsTo = array(
		'Vehicle' => array('foreignKey' => 'vehicle_id'),

	);
  public $validate = array(
    'name' => array(
      'name' => array(
        'rule' => 'notEmpty',
        'required' => true,
        'message' => 'Informe seu nome'
      )
     ),
     'email'=>array(
      'email' => array(
        'rule' => 'email',
        'required' => true,
        'message' => 'Informe um formato de e-mail válido',
        )
      ),
      'telephone'=>array(
      'telephone' => array(
        'rule'=>array('custom', '/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/'),
         'required'=>true,
        'message'=>'Informe o telefone no formato indicado'
      )
     ),
     /*'date'=>array(
      'date' => array(
        'rule'=>array('date', 'dmy'),
         'required'=>true,
        'message'=>'Informe um formato de data válido'
      )
     ) */

  );

}
?>
