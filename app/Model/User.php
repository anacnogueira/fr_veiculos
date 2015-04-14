<?php
class User extends AppModel {
  public $name = 'User';

  public $validate = array(
    'name' => array(
      'name' => array(
        'rule' => 'notEmpty',
        
        'message' => 'Informe seu nome'
      )
     ),
     'cpf'=>array(

       'isUniqueCPF'=>array(
          'rule'=>'isUnique',
          'message'=>'CPF já cadastrado',
          'on'=>'update'
        ),
        'validCPF'=>array(
          'rule'=>array('isCPF','cpf'),
          'message'=>'Formato de CPF inválido'
        ),
        'isEmptyCPF'=>array(
          'rule'=>'notEmpty',
          'required'=>false,
          'message'=>'Informe seu CPF'
        )

     ),
     'email'=>array(
      'email' => array(
        'rule' => 'email',
        'required' => true,
        'message' => 'Informe um formato de e-mail válido',

      ),
      'isUniqueEmail'=>array(
       'rule'=>'isUnique',
       'required'=>true,
       'on'=>'update',
       'message'=>'E-mail já cadastrado'
      )
     ),
     'password'=>array(
      'senha' => array(
        'rule' => array('between',6,15),
        'required' => true,
         'on'=>'create',
        'message' => 'Sua senha deve conter entre 6 e 15 caracteres'
      )
     ),
     'ativo'=>array(
      'rule'=>array('inList', array('S', 'N')),
      'message'=>'Informe o status do usuário'

     ),
     //LOGIN
     'username'=>array(
      'rule'=>'notEmpty',
      'message'=>'Preencha o campo com seu e-mail'
     ),
     'senha'=>array(
      'rule'=>'notEmpty',
      'message'=>'Preencha o campo com sua senha'
     ),
     //Alterar senha
     'senhaAtual'=>array(
      'checkPassword'=>array(
        'rule'=>array('checkPassword'),
        'message'=>'Senha diferente da senha cadastrada'
      ),
      'notEmptyPwd'=>array(
       'rule'=>'notEmpty',
       'message'=>'Informe sua senha atual'
      )
     ),
     'password1'=>array(
       'rule' => array('between',6,15),
       'message' => 'Sua nova senha deve conter entre 6 e 15 caracteres'
     ),
     'password2'=>array(
      'rule' => array('confirmPassword','password2'),
      'message' => 'A confirmação da senha não confere com a senha fornecida'
     )

  );

  function checkPassword($field=array()){
     foreach( $field as $key => $value ){

      if($key == 'senhaAtual'){
        //Verifica senha atual
        $senha = Security::hash($value);

        App::import('Component', 'SessionComponent');
        //$Session = new SessionComponent(); decrapted, only work on 1.X
        $Session = SessionComponent::read("user.id");

        $result = $this->find('first',array('conditions'=>array(
         'User.id'=>$Session,'password'=>$senha)));
        
        if(!$result)
          return false;

        return true;
      }
    }
  }

  function confirmPassword($data) {
		$valid = false;
		if ($data['password2'] ==  $this->data['User']['password1']) {
			$valid = true;
		}
		return $valid;
	}

  function naoVazio($data){
    if(!empty($data['estado']))
      return true;

     return false;
  }

  public function isCPF($data){

    //if(!empty($data['cpf'])){
      // Retira pontos e traços
      $data['cpf'] = str_replace("-","",(str_replace(".","",$data['cpf'])));

      //Verifica se o tamanho contem 11 caracteres (sem traço e ponto)
      if(strlen($data['cpf']) != 11){
       return false;
      }
      //Verifica se o CPF informado é um numero inteiro
      elseif(!is_numeric($data['cpf'])){
        return false;
      }
      //Verifica se o CPF é constituído de números repetidos de 11111111111 até 99999999999
      elseif(($data['cpf'] == '11111111111') || ($data['cpf'] == '22222222222') ||
        ($data['cpf'] == '33333333333')  ||  ($data['cpf'] == '44444444444') ||
        ($data['cpf'] == '55555555555') ||  ($data['cpf'] == '6666666666') ||
        ($data['cpf'] == '77777777777') ||  ($data['cpf'] == '88888888888') ||
        ($data['cpf'] == '99999999999') ||  ($data['cpf'] == '00000000000'))  {
        return false;
      }
      else {
        //Pega o digito verificador
        $dv_informado = substr($data['cpf'],9,2);

        for($i=0;$i<=8;$i++){
         $digito[$i] = substr($data['cpf'],$i,1);
        }

        //Calcula o valor do 10º digito de verificação
        $posicao = 10;
        $soma = 0;

         for($i=0;$i<=8;$i++){
          $soma = $soma + $digito[$i] * $posicao;
          $posicao--;
         }

        $digito[9] = $soma % 11;

        if($digito[9] < 2){
          $digito[9] = 0;
        }
        else{
          $digito[9] = 11 - $digito[9];
        }

        //Calcula o valor do 11º digito de verificação
        $posicao = 11;
        $soma = 0;

        for($i=0;$i<=9;$i++){
          $soma = $soma + $digito[$i] * $posicao;
          $posicao--;
        }

        $digito[10] = $soma %11;

        if($digito[10]<2){
          $digito[10] = 0;
        }
        else{
          $digito[10] = 11 - $digito[10];
        }

        //verifica se o dv calculado é igual ao informado
        $dv = $digito[9] * 10 + $digito[10];
        if($dv != $dv_informado){
          return false;
        }
        else {
          return true;
        }
      }
    //}

  }

  function beforeSave(){
    App::import("Controller", "App");
    $App = new AppController();
    if(!empty($this->data['User']['data_nascimento'])){
      $this->data['User']['data_nascimento'] = $App->format_date($this->data['User']['data_nascimento'],2);
    }
    if(!empty($this->data['User']['password'])){
      $this->data['User']['password'] = Security::hash($this->data['User']['password']);
    }
    return true;
  }
}
?>
