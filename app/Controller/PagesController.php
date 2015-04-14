<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Vehicle','News','Type','Venda');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
      $title_for_layout = "";

		$this->render(implode('/', $path));
    $this->set(compact('page', 'subpage', 'title_for_layout'));
	}

  public function index(){
    $title_for_layout = " Home";

    $this->Vehicle->bindModel(array('belongsTo'=>array(
        'Brand'=>array(
          'foreignKey'=>false,
          'conditions'=>array('Brand.id = Modelo.brand_id')),
     )));

    //Mostrar 3 ultimos carros cadastrados
    $cars = $this->Vehicle->find('all',array(
      'conditions'=>array(
        'Type.name'=>'Carro',
        'Vehicle.status'=>'S'
      ),
      'order'=>array('Vehicle.created DESC'),
      'limit'=>3
    ));

    //Mostrar 3 ultimas motos cadastradas
    $this->Vehicle->bindModel(array('belongsTo'=>array(
        'Brand'=>array(
          'foreignKey'=>false,
          'conditions'=>array('Brand.id = Modelo.brand_id')),
     )));

    $motos = $this->Vehicle->find('all',array(
      'conditions'=>array(
        'Type.name'=>'Moto',
        'Vehicle.status'=>'S'
      ),
      'order'=>array('Vehicle.created DESC'),
      'limit'=>3
    ));

    //Mostrar 3 ultimas noticias cadastradas
    $news = $this->News->find('all',array(
       'order'=>array('News.date_published DESC','News.id DESC'),
      'limit'=>3
    ));

    $this->set(compact('cars','motos','news'));
    $this->set(compact('title_for_layout'));
  }
  public function venda_seu_veiculo(){
    $title_for_layout = " Venda seu veículo";
    $this->set(compact('title_for_layout'));
  }
  public function sent(){
    $title_for_layout = " Venda seu veículo - Formulário enviado";
    $this->set(compact('title_for_layout'));

    //Emviar form de venda seu veículo
      if (!empty($this->data)) {
        if ($this->Venda->validates()) {
        $this->Venda->set($this->data);
        $type = $this->Type->read(null,$this->data['Venda']['type_id']);
        //Envair por e-mail
        $body = "<h1>Intenção de venda de veículo</h1>";
        $body .= "<p>Nome: <b>".$this->data['Venda']['name']."</b></p>";
        $body .= "<p>E-mail: <b>".$this->data['Venda']['email']."</b></p>";
        $body .= "<p>E-Telefone: <b>".$this->data['Venda']['telephone']."</b></p>";
        $body .= "<p>Estado: <b>".$this->data['Venda']['uf']."</b></p>";
        $body .= "<p>Cidade: <b>".$this->data['Venda']['city']."</b></p>";
        $body .= "<p>Tipo: <b>".$type['Type']['name']."</b></p>";
        $body .= "<p>Marca: <b>".$this->data['Venda']['brand']."</b></p>";
        $body .= "<p>Modelo: <b>".$this->data['Venda']['modelo']."</b></p>";
        $body .= "<p>Ano fabricação: <b>".$this->data['Venda']['manufacturing_year']."</b></p>";
        $body .= "<p>Ano modelo: <b>".$this->data['Venda']['model_year']."</p>";
        $body .= "<p>Informações Adicionais: <b>".$this->data['Venda']['aditional_informations']."</b></p>";

        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('smtp');
        $Email->from(Configure::read('Site.email'));
        $Email->to(Configure::read('Site.email_dev'));

        $Email->subject('['.Configure::read('Site.name').'] Intenção de venda de veículo');
        $Email->template('default','default');
        $Email->emailFormat('html');
        //$Email->viewVars(array('activate_url' => $activate_url,'name' => $name));
        $Email->send($body);
        }
      }
  }

  public function servicos(){
    $title_for_layout = " Serviços";
    $this->set(compact('title_for_layout'));
  }
}
