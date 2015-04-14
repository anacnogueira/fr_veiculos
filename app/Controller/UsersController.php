<?php
  class UsersController extends AppController{
    var $name = "Users";
    var $helpers = array('Status');

    /* ADMIN */
      function admin_login() {
      $this->set("title_for_layout","Login");
      //Página de redirecionamento após o susuário estar logado
      $redirect = '/admin/vehicles/';


      if(!empty($this->data)){
        $this->User->set($this->data);
        if($this->User->validates(array('fieldList' => array('username','senha')))) {
          $email    = $this->data['User']['username'];
          $password = Security::hash(trim($this->data['User']['senha']));

          $user = $this->User->find('first',array(
            'conditions'=>array('email'=>$email,'password'=>$password),
            'recursive'=>0,
            'fields'=>array('User.id','User.name','User.email','User.ativo')
          ));

          //Validar e-mail e senha
          if(!$user)
            $this->Session->setFlash(__('Usuário e/ou senha inválidos.',true));
          else{
            $this->Session->write('user',$user['User']);
            $this->redirect($redirect);
          }
        }
      }
    }

     function login() {
        $this->layout = 'admin';
      $this->set("title_for_layout","Login");
      //Página de redirecionamento após o susuário estar logado
      $redirect = '/admin/vehicles/';


      if(!empty($this->data)){
        $this->User->set($this->data);
        if($this->User->validates(array('fieldList' => array('username','senha')))) {
          $email    = $this->data['User']['username'];
          $password = Security::hash(trim($this->data['User']['senha']));

          $user = $this->User->find('first',array(
            'conditions'=>array('email'=>$email,'password'=>$password),
            'recursive'=>0,
            'fields'=>array('User.id','User.name','User.email','User.ativo')
          ));

          //Validar e-mail e senha
          if(!$user)
            $this->Session->setFlash(__('Usuário e/ou senha inválidos.',true));
          else{
            $this->Session->write('user',$user['User']);
            $this->redirect($redirect);
          }
        }
      }
    }

    function admin_logout() {
      $redirect = '/admin/login';
      $this->Session->delete('user');
      $this->Session->destroy();
      $this->Session->setFlash('Sessão encerrada.');
      $this->redirect($redirect);
    }

    function admin_esqueci_senha(){
      $this->set("title_for_layout","Esqueci a senha");
      if($this->data){
        // Check for data validation
        $this->User->set($this->data);
        if($this->User->validates(array('fieldList' => array('email')))) {
          $data = $this->User->find('first',
            array('conditions'=>array(
              'email'=>$this->data['User']['email']),
              'ativo'=>'S'
              ));

          if(!empty($data)){
            //Verificar se o e-mail esta cadastrado
             $password = parent::_gera_passwd();


            //Gerar nova senha e enviar por e-mail
            if($this->User->updateAll(
              array('User.password' => "'".Security::hash($password)."'"),
              array('User.id'=>$data['User']['id'])
            )){
              //Enviar por e-mail
              $body = "<h1>".$data['User']['name'].",</h1>";
              $body .= "<p>Segue nova senha gerada </p>";
              $body .= "<strong>".$password."</strong>";


              App::uses('CakeEmail', 'Network/Email');
              $Email = new CakeEmail();
              $Email->config('smtp');
              $Email->from(Configure::read('Site.email'));
              $Email->to($data['User']['email']);
              $Email->subject('['.Configure::read('Site.name').'] Nova senha gerada');
              $Email->template('default','admin');
              $Email->emailFormat('html');
              //$Email->viewVars(array('activate_url' => $activate_url,'name' => $name));
              $Email->send($body);
              $this->redirect(array("action"=>"admin_nova_senha_cadastrada"));
            }
          }
         else{
            $msg = "E-mail desconhecmadido.";
            $this->set("msg",$msg);
          }
        }
      }
    }

    function admin_nova_senha_cadastrada($id = null) {
      $this->set("title_for_layout","Nova senha cadastrada");
    }

    function admin_alterar_dados($id = null){
      $this->set("title_for_layout","Alterar dados");

      if(!$id)
        $id = $this->Session->read('user.id');

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Usuário Inválido', true));
		  }
		  if(!empty($this->data)) {
        $field_list = array('fieldList' => array('name', 'email','cpf'));
        if($this->User->validates($field_list)) {
          $user = array();
          $user['name']            = "'".$this->data['User']['name']."'";
          $user['email']           = "'".$this->data['User']['email']."'";
          $user['cpf']             = "'".$this->data['User']['cpf']."'";
          $user['telefone']        = "'".$this->data['User']['telefone']."'";
          $user['celular']         = "'".$this->data['User']['celular']."'";

			    if ($this->User->updateAll($user,array('User.id'=>$id))) {
				    $this->Session->setFlash(__('Dados alterados com sucesso', true));
          }
			    else {
            $this->Session->setFlash(__('Não foi possível salvar usuário', true));
			    }
        }

        else {
    // didn't validate logic
    $errors = $this->User->validationErrors;
    pr($errors);
}
		  }
		  if (empty($this->data)) {
        $this->data = $this->User->read(null, $id);
        if(!empty($this->data['User']['data_nascimento'])){
          $this->data['User']['data_nascimento'] = parent::format_date($this->data['User']['data_nascimento'],1);
        }
		  }
    }

    function admin_alterar_senha($id = null){

      $this->set("title_for_layout","Alterar senha");

      if(!$id)
        $id = $this->Session->read('user.id');

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Usuário Inválido', true));
      }
		  if(!empty($this->data)) {
		    $this->User->set($this->data);
        $fields = array('senhaAtual','password1','password2');

        if($this->User->validates(array('fieldList' => $fields))) {
          $user = array();
          $user['password']            = "'".Security::hash($this->data['User']['password1'])."'";
          if ($this->User->updateAll($user,array('User.id'=>$id))) {
				    $this->Session->setFlash(__('Senha alterada com sucesso', true));
          } else {
            $this->Session->setFlash(__('Não foi possível salvar usuário', true));
			    }
        }
		  }
		  if (empty($this->data)) {
        $this->data = $this->User->read(null, $id);

		  }
    }

    function admin_index(){

      $this->User->recursive = 1;
      //Filtrar condições
      $conditions = array();
      if(empty($this->data))
        $index_qtde = 1;
      else
        $index_qtde  = $this->data['User']['qtde'];

      if(!empty($this->data['User']['nome'])){
        $conditions['name LIKE'] = '%'.$this->data['User']['name'].'%';
      }
      if(!empty($this->data['User']['ativo'])){
        $conditions['ativo'] = $this->data['User']['ativo'];
      }
      $this->paginate = array(
        'limit'=>$this->qtde[$index_qtde],
        'conditions' => array($conditions),
        'fields' => array('User.*'));

      $users = $this->paginate('User');
      $count = $this->User->find('count',array('conditions'=>$conditions));
      $this->set(compact('users','count'));
    }

    function admin_view($id = null){

      $this->set("title_for_layout","Usuário &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Usuário Inválido', true));
        $this->redirect(array('controller'=>'Users','action'=>'admin_index'));
		  }
      $user =  $this->User->read(null, $id);
      $user['User']['created'] = parent::format_date($user['User']['created'],4);
      $user['User']['modified'] = parent::format_date($user['User']['modified'],4);
		  $this->set(compact('user'));
    }

    function admin_add(){
      $this->layout = "admin";
      $this->set("title_for_layout","Usuário &raquo; Novo usuário");

      if (!empty($this->data)) {
        //if($this->User->validates()) {
          $this->User->create();

          if ($this->User->save($this->data)) {
            $this->Session->setFlash(__('Usuário criado com sucesso.', true));
            $this->redirect(array("action" => "admin_index"));
			    } else {
            //Erro ao cadastrar usuário
            $this->Session->setFlash(__('Não foi possível cadastrar usuário. Por favor,
            contacte o administrador do site.', true));
          }
        //}
      }
    }

    function admin_edit($id = null){
      $this->layout = "admin";
      $this->set("title_for_layout","Usuário &raquo; Editar usuário");

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Usuário Inválido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if (!empty($this->data)) {
        if ($this->User->save($this->data)) {
				  $this->Session->setFlash(__('O usuário foi salvo.', true));
          $this->redirect(array('controller'=>'Users','action'=>'admin_index'));
			  } else {
          $this->Session->setFlash(__('Não foi possível editar usuário.', true));
          $this->redirect(array('controller'=>'Users','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $this->data = $this->User->read(null, $id);
        if(!empty($this->data['User']['data_nascimento'])){
          $this->data['User']['data_nascimento'] = parent::format_date($this->data['User']['data_nascimento'],1);
        }
		  }
    }

    function admin_delete($id = null){
      if (!$id) {
			  $this->Session->setFlash(__('Usuário Invalido', true));
        $this->redirect(array("action" => "admin_index"));
		  }
		  if ($this->User->delete($id)) {
			  $this->flash(__('Usuário excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
    }
  }

