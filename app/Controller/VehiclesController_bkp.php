<?php
  class VehiclesController extends AppController{

     public $name = 'Vehicles';
     public $uses = array('Vehicle','Type','Category','Brand','Modelo','Item','ItemValue');
     public $helpers = array('Status');

    /*---- ADMIN -----*/
     public function admin_index(){
      $qtde =array('10','20','30','50','100');
       //Filtrar condições
       $conditions = array();
       if(empty($this->data))
          $index_qtde = 1;
      else
        $index_qtde  = $this->data['Vehicle']['qtde'];
     //Marca
     if(!empty($this->data['Vehicle']['brand_id'])){
       $conditions['brand_id'] = $this->data['Vehicle']['brand_id'];
     }
     //Modelo
     if(!empty($this->data['Vehicle']['modelo_id'])){
       $conditions['modelo_id'] = $this->data['Vehicle']['modelo_id'];
     }
     //Ano
     if(!empty($this->data['Vehicle']['year'])){
       $conditions['OR'] = array(
         "manufacturing_year" => $this->data['Vehicle']['year'],
         "model_year" => $this->data['Vehicle']['year']
       );
     }

     //Valor
    if(!empty($this->data['Vehicle']['value_from']) && empty($this->data['Vehicle']['value_to'])){
      $value_from = parent::__convert_number_to_en_format($this->data['Vehicle']['value_from']);
      $conditions['price >='] = $value_from;
    }
    if(empty($this->data['Vehicle']['value_from']) && !empty($this->data['Vehicle']['value_to'])){
      $value_to = parent::__convert_number_to_en_format($this->data['Vehicle']['value_to']);
      $conditions['price <='] = $value_to;
    }
    if(!empty($this->data['Vehicle']['value_from']) && !empty($this->data['Vehicle']['value_to'])){
      $value_from = parent::__convert_number_to_en_format($this->data['Vehicle']['value_from']);
      $value_to = parent::__convert_number_to_en_format($this->data['Vehicle']['value_to']);
      $conditions['price  BETWEEN ? AND ?'] = array($value_from,$value_to);
    }

     //Status
      if(!empty($this->data['Vehicle']['status'])){
      $conditions['status'] = $this->data['Vehicle']['status'];
     }


     //Settings
     $this->Vehicle->bindModel(array('belongsTo'=>array(
                    'Brand'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Brand.id = Modelo.brand_id')),
                    )));

       $this->paginate = array(
      'limit'=>$this->qtde[$index_qtde],
      'conditions' => array($conditions),
      );
      $vehicles = $this->paginate('Vehicle');

      $brands = $this->Brand->find('list',array('order'=>'Brand.name'));
      $brands = array(0 =>"Todos") + $brands;

      $count = $this->Vehicle->find('count',array('conditions'=>$conditions));

      $this->set(compact('vehicles','brands','qtde','count'));
     }


     public function admin_add(){
      //Salvar dados
      $save = true;
      if (!empty($this->data)) {
        $this->Vehicle->set($this->data);

        if($this->Vehicle->validates()){
            $data = $this->data;
            $data["Vehicle"]['price'] = parent:: __convert_number_to_en_format($this->data['Vehicle']['price']);
            $this->Vehicle->create();
            if ($this->Vehicle->save($data)) {
              $vehicle_id = $this->Vehicle->id;
              //Item opcionais
              if(!empty($data['item'])){
                foreach($data['item'] as $key => $value){
                  $item['VehicleItemValue']['vehicle_id'] = $vehicle_id;
                  $item['VehicleItemValue']['item_id'] = $key;
                  $item['VehicleItemValue']['item_value_id'] = $value;

                  $this->Vehicle->VehicleItemValue->create();
                  $this->Vehicle->VehicleItemValue->save($item);
                }
              }

             //Fotos
             if(!empty($this->data['Vehicle']['foto_img']) and is_array($this->data['Vehicle']['foto_img'])){
               foreach($this->data['Vehicle']['foto_img'] as $item){
                  $imagens = array();
                  $imagem['vehicle_id'] = $vehicle_id;
                  $imagem['name'] = $item;
                  $this->Session->delete('qtde');
                  $this->Vehicle->VehiclePhoto->create();
                  if(!$this->Vehicle->VehiclePhoto->save($imagem)){
                    //debug($this->Vehicle->validationErrors); die();
                    $save = false;
                  }
               }
             }
            $this->Session->setFlash(__('Veículo criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
          }
        }
      }

      //Carregar Dados
      $types = $this->Vehicle->Type->find('list');
      $categories = $this->Vehicle->Category->find('list');
      $brands = $this->Brand->find('list',array(
      'order'=>'Brand.name'));
      $brands = array(0 => "Selecione...") + $brands;

      //Items
      $items = $this->Item->find('all',array(
        'conditions' => array('Item.name NOT LIKE' =>'Opcional%'),
        'recursive'=>  -1,
        'fields' => array('id','name')
      ));

      for($i=0;$i < count($items);$i++){
        $items[$i]['ItemValue'] = $this->ItemValue->find('list',array(
          'conditions' => array('ItemValue.item_id' =>$items[$i]['Item']['id']),
          'recursive'=>  -1,
          'fields' => array('id','name')
        ));
      }

      $opcionais1  = $this->ItemValue->find('all',array(
        'recursive'=>2,
        'conditions'=>array(
        'Item.name' => 'Opcional1'
      )));

      $opcionais2 =  $this->ItemValue->find('all',array(
        'recursive'=>2,
        'conditions'=>array(
        'Item.name' => 'Opcional2'
      )));

      $this->set(compact('types','categories','brands','modelos','items','opcionais1','opcionais2'));
    }

    public function admin_edit($id = null){


     }

     public function admin_view($id = null){
      $this->set("title_for_layout","Veículo &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Veículo Inválido', true));
        $this->redirect(array('action'=>'index'));
		  }

      $this->Vehicle->bindModel(array('belongsTo'=>array(
                    'Brand'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Brand.id = Modelo.brand_id')),
                    )));

		  $vehicle = $this->Vehicle->find('first',array(
        'recursive'=>0,
        'conditions'=>array('Vehicle.id'=>$id)
      ));

      //Items

      //Fotos
      $this->set(compact('vehicle'));
     }

     public function admin_delete($id=null){
        if (!$id) {
			    $this->Session->setFlash(__('Veículo Inválido', true));
          $this->redirect(array("action" => "admin_index"));
		    }
		  if ($this->Vehicle->delete($id)) {
			  $this->flash(__('Veículo excluído', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
     }

    /*---- SITE -----*/
    public function index(){
    $conditions = array();
    //Definir titulo da pagina
    //Resultado da busca
    if(!isset($this->params->type)) {
      $title_for_layout = "Resultado da busca";

      //Condições

     //Tipo (CArro ou Moto)
     if(!empty($this->data['Vehicle']['type_id'])){
       $conditions['type_id'] = $this->data['Vehicle']['type_id'];
     }
     //Marca
     if(!empty($this->data['Vehicle']['brand_id'])){
       $conditions['brand_id'] = $this->data['Vehicle']['brand_id'];
     }
     //Modelo
     if(!empty($this->data['Vehicle']['modelo_id'])){
       $conditions['modelo_id'] = $this->data['Vehicle']['modelo_id'];
     }
     //Ano
     if(!empty($this->data['Vehicle']['year'])){
       $conditions['OR'] = array(
         "manufacturing_year" => $this->data['Vehicle']['year'],
         "model_year" => $this->data['Vehicle']['year']
       );
     }
     //Preço
     if(!empty($this->data['Vehicle']['price'])){
        $conditions[] = $this->data['Vehicle']['price'];

     }
     //Categoria (Novo ou Seminovo)
     if(!empty($this->data['Vehicle']['category_id'])){
       $conditions['category_id'] = $this->data['Vehicle']['category_id'];
     }
    }
    //Carros e Motos
    elseif(isset($this->params->type) and !empty($this->params->type)){
      $type = $this->params->type;
      $title_for_layout = $type . 's';
      //Carrega id do type
      $type = $this->Vehicle->Type->find('first',array(
       'conditions' => array('name' => $type)
      ));
      $type_id = $type['Type']['id'];
      $conditions = array('type_id' => $type_id);
    }

     $this->Vehicle->bindModel(array('belongsTo'=>array(
                    'Brand'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Brand.id = Modelo.brand_id')),
                    )));

     $this->paginate = array(
      'limit'=>9,
      'order'=>array('type_id ASC'),
      'conditions' => array($conditions),
      );
      $vehicles = $this->paginate('Vehicle');
      $this->set(compact('title_for_layout','vehicles'));
      //pr($vehicles);
    }
    public function view(){
      $id = $this->params->id;
      if (!$id) {
			  $this->Session->setFlash(__('Veículo Inválido', true));
		  }

       $this->Vehicle->bindModel(array('belongsTo'=>array(
        'Brand'=>array(
          'foreignKey'=>false,
          'conditions'=>array('Brand.id = Modelo.brand_id')),
       )));

      $this->Vehicle->bindModel(array('belongsTo'=>array(
                    'Brand'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Brand.id = Modelo.brand_id')),
                    )));

		  $vehicle = $this->Vehicle->find('first',array(
        'conditions'=>array('Vehicle.id'=>$id)
      ));
       //Items
      $dataset = $this->Vehicle->VehicleItemValue->find('all',array(
       'fields'=>array('Item.*','ItemValue.*'),
        'conditions' => array('Item.name NOT LIKE' =>'Opcional%'),
      ));

      $items = array();
      foreach($dataset as $value){
        $items[$value['Item']['name']] = $value['ItemValue']['name'];
      }

      //Opcionais
      $opts = $this->Vehicle->VehicleItemValue->find('all',array(
        'fields'=>array('Item.*','ItemValue.*'),
        'conditions' => array('Item.name LIKE' =>'Opcional%'),
      ));
      foreach($opts as $value){
        $options[$value['Item']['name']][] = $value['ItemValue']['name'];
      }
      pr($options);
      $this->set(compact('vehicle','items','options'));
    }

    /*---- OUTRAS FUNÇÔES -----*/
    function manager_files(){
      $this->autoRender = false;
      Configure::write ( 'debug', 2 );
      $destination = Configure::read('File.destination_vehicles');
      

     if($this->params['form']['photo']){ //a imagem existe
        $file = $this->params['form']['photo'];

        $ext = substr(strtolower($file["name"]),-3);
       //1. Verificar extensão
       if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'png') {
         $erro = 'Você só pode fazer upload de imagens com as extensões permitidas';
         exit;
       }
       //2. Verificar tamanho do arquivo
       else if($file['size'] > Configure::read('File.max_file_size_kb')){
          $erro =  "Tamanho do arquivo maior que o permitido";
          exit;
       }
      else{
        //1. Verifica o id da ultima foto e acrescenta 1'
        $photo_id =  $this->Vehicle->VehiclePhoto->find('first',array(
          'fields'=>array('id'),
          'order'=>'id DESC'));

        //2. Nome foto original'
        $name_ori = "vehicle_ori_".$this->data['VehiclePhoto']['vehicle_id']."_".($photo_id['VehiclePhoto']['id']+1).".jpg";

        //fazer upload do arquivo
        if(!copy($file['tmp_name'], $destination.$name_ori))
          $erro = 'Não foi possível fazer upload do arquivo original';
        else
          $this->data['VehiclePhoto']['photo_ori'] = $name_ori;


        //3. Nome Foto redimensionada'
        $name_redim = "vehicle_redim_".$this->data['VehiclePhoto']['vehicle_id']."_".($photo_id['VehiclePhoto']['id']+1).".jpg";
        $result = $this->Upload->upload($file, $destination, $name_redim, array('type' => 'resize', 'size' => array('380', '252'), 'output' => 'jpg'));

        if (!$result)
			    $this->data['VehiclePhoto']['photo_redim'] = $this->Upload->result;
		    else {
			    // display error
			    $errors = $this->Upload->errors;

			    // piece together errors
			    if(is_array($errors)){ $erro = implode("/n",$errors); }
        }

        if(!empty($this->data['VehiclePhoto']['photo_ori']) and !empty($this->data['VehiclePhoto']['photo_redim'])){ //salvar no banco
          echo $name_ori;
          $this->Vehicle->VehiclePhoto->save($this->data);
        }
      }
     }
     else{
       $erro = 'Nenhuma imagem definida';
     }

      if(!empty($erro)){
        echo 'Erro:'.$erro;
      }
    }

    function delete_file($file=null){
      $this->autoRender = false;
      Configure::write ( 'debug', 0 );
      $destination = Configure::read('File.destination_vehicles');
      if($file){
        //1. Apaga imagem do banco de dados
        $this->Vehicle->VehiclePhoto->delete($file);

        //Apaga imagem da pasta
        if(file_exists($destination.$file)){
          unlink($destination.$file);
          echo "Apagou";
        }
        else
          echo "Erro: O arquivo não existe";
      }
    }

    public function get_modelos($brand_id = null){
      if($brand_id){
        $this->autoRender = false;
        //Configure::write ( 'debug', 0 );
        $modelos = $this->Modelo->find('list',array(
         'conditions' => array('brand_id' => $brand_id),
         'order' => 'Modelo.name'
        ));

        $modelos = array(0 => "Todos") + $modelos;
        if(!empty($modelos)){
          foreach($modelos as $key=>$value){
            $out[$key]['value'] = $key;
            $out[$key]['caption'] = $value;
          }

          return json_encode($out);
        }
      }
    }

   }
?>
