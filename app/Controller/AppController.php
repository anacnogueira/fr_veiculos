<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   public $helpers = array('Html','Form','Js','Session','Text');
   public $components = array('Email','Session','RequestHandler','Security','Upload');
   public $uses = array('MenuAdmin','User','Type','Brand','Vehicle');
   public $qtde = array('10','20','30','50','100');
   public $status = array('0'=>'Todos','S'=>'Sim','N'=>'Não');

   public function beforeFilter(){
      //Admin
      if ($this->_isAdmin()) {
        $this->layout = 'admin';
        $admin_exceptions = array('admin_esqueci_senha','admin_cadastrar_nova_senha','admin_nova_senha_cadastrada');
        if(!in_array($this->params['action'],$admin_exceptions)){
          $this->checkAdminSession();
        }
      }
      $this->Security->csrfCheck=false;
      $this->Security->validatePost = false;

    }

    public function beforeRender(){
      $menu_admin = $this->MenuAdmin->find('all',array(
      'conditions'=>array('ativo'=>'S'),
      'order'=>'order'));
      /* Site */
      $types_list = $this->Type->find('list');
      $types_list = array(0 => "Todos") + $types_list;

      $brands_list = $this->Brand->find('list',array(
       'order'=>'name'
      ));
      $brands_list = array(0 =>"Todos") + $brands_list;

      //Anos dos veículso cadastrados
      $y = $this->Vehicle->find('all',array(
        'fields'=>array('DISTINCT model_year','manufacturing_year'),
        'order'=>'model_year',
        'recursive'=>-1
      ));
      foreach($y as $key => $value){
        $years[$value['Vehicle']['model_year']] = $value['Vehicle']['model_year'];
        $years[$value['Vehicle']['manufacturing_year']] = $value['Vehicle']['manufacturing_year'];
      }
      $years[0] = "Todos";
      ksort($years);

      //Faixa de preços 
      $valores = array(
       'price <= 15000' => 'Até R$ 15 mil',
       'price >=16000 AND price <= 25000' => 'De R$ 15 mil a R$ 25 mil',
		   'price >=26000 AND price <= 35000' => 'De R$ 26 mil a R$ 35 mil',
		   'price >=36000 AND price <= 50000' => 'De R$ 36 mil a R$ 50 mil',
		   'price >= 51000 AND price <= 65000' => 'De R$ 51 mil a R$ 60 mil',
		   'price >61000' => 'Mais de R$ 61 mil'
      );

      $valores = array(0=>'Todos') + $valores;

      $this->set(compact('types_list','brands_list','years','valores'));

      /* Admin */
      $qtde = $this->qtde;
      $status = array('0'=>'Todos','S'=>'Sim','N'=>'Não');
      $estados = $this->__estados_br();
      $this->set(compact('qtde','status','menu_admin','estados'));
      return true;
   }

   private function __estados_br(){
     $arraEstados = array("AC"=>"Acre","AL"=>"Alagoas","AM"=>"Amazonas","AP"=>"Amapá",
     "BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espirito Santo","GO"=>"Goiás",
     "MA"=>"Maranhão","MG"=>"Minas Gerais","MG"=>"Mato Grosso do Sul","MT"=>"Mato Grosso","PA"=>"Pará",
     "PB"=>"Paraíba","PE"=>"Pernambuco","PI"=>"Piauí","PR"=>"Paraná","RJ"=>"Rio de Janeiro",
    "RN"=>"Rio Grande Norte","RO"=>"Rondônia","RR"=>"Roraima","RS"=>"Rio Grande do Sul",
    "SC"=>"Santa Catarina","SP"=>"São Paulo","SE"=>"Sergipe","TO"=>"Tocantins");
    asort($arraEstados);
    array_unshift($arraEstados,"Selecione");
    return $arraEstados;
   }


   /*--------------------------------------------------------------------------------'
  '   													Função conversora de Data														'
  '   1 =  AAAA-MM-DD para DD/MM/AAAA                   														'
  '   2 =  DD/MM/AAAA para AAAA-MM-DD                  														  '
  '   3 = DD/MM/AAAA 00:00:00 para AAAA-MM-DD 00:00:00  														'
  '   4 = AAAA-MM-DD 00:00:00 para DD/MM/AAAA 00:00:00  														'
  ---------------------------------------------------------------------------------*/
  public function format_date($date,$cod_format){
    $date = str_replace("'","",$date);
    switch($cod_format){
      case 1:
        $conv1 = explode("-",$date);
        $out = implode("/",array_reverse($conv1));
        break;
      case 2:
        $conv1 = explode("/",$date);
        $out = implode("-",array_reverse($conv1));
        break;
      case 3:
        $convHora = explode(" ",$date);
        $ConvData = explode("/",$convHora[0]);
        $out = implode("-",array_reverse($ConvData))." ".$convHora[1];
        break;
      case 4:
        $convHora = explode(" ",$date);
        $ConvData = explode("-",$convHora[0]);
        $out = implode("/",array_reverse($ConvData))." ".$convHora[1];
        break;
      }
      return $out;
   }

   private function checkAdminSession(){
      if(!$this->Session->check('user')){
        //Set flash message and redirect
        $this->Session->setFlash(__('Por favor, faça seu login como administrador',true));
        $this->redirect('/admin/login');
     } else {
      $this->Session->setFlash(__('',true));
    }
   }

   public function _upload_file($file,$destination,$id,$size=null){
      $name = "foto_".$id.".jpg";
      if(empty($size))
        $size = array('380', '252');

      $result = $this->Upload->upload($file, $destination, $name, array('type' => 'resize', 'size' => $size, 'output' => 'jpg'));

       return $this->Upload->result;
   }

   public function _delete_file($file,$destination){
    if(file_exists($destination.$file)){
        @unlink($destination.$file);
    }
   }

   public  function _gera_passwd(){
    $sConso = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz';
    $sVogal = 'aeiou';
    $sNum = '123456789';
    $passwd = '';

    $y = strlen($sConso)-1; //conta o nº de caracteres da variável $sConso
    $z = strlen($sVogal)-1; //conta o nº de caracteres da variável $sVogal
    $r = strlen($sNum)-1; //conta o nº de caracteres da variável $sNum

     for($x=0;$x<=2;$x++){
      $rand = rand(0,$y); //Funçao rand() - gera um valor randômico
      $rand1 = rand(0,$z);
      $rand2 = rand(0,$r);
      $str = substr($sConso,$rand,1); // substr() - retorna parte de uma string
      $str1 = substr($sVogal,$rand1,1);
      $str2 = substr($sNum,$rand2,1);
      $passwd .= $str.$str1.$str2;
    }
    return $passwd;
  }

  public function __convert_number_to_en_format($valor){

     $out = str_replace('.','',$valor);
     $out = str_replace(',','.',$out);

     return $out;
  }

  private function _isAdmin() {
      $url =  $this->params->url;

      if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
        return TRUE;
      } else {
        return FALSE;
      }
    }
}
