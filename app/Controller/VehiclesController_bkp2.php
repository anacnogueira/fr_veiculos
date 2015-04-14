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
              /*if(!empty($data['item'])){
                foreach($data['item'] as $key => $value){
                  $item['VehicleItemValue']['vehicle_id'] = $vehicle_id;
                  $item['VehicleItemValue']['item_id'] = $key;
                  $item['VehicleItemValue']['item_value_id'] = $value;

                  $this->Vehicle->VehicleItemValue->create();
                  $this->Vehicle->VehicleItemValue->save($item);
                }
              } */

             //Fotos

             if(!empty($this->data['VehiclePhoto'])){
                foreach($this->data['VehiclePhoto'] as $photo){
                  $data["VehiclePhoto"]['vehicle_id'] = $vehicle_id;
                  $data["VehiclePhoto"]['photo_ori'] = $photo['photo_ori'];
                  $data["VehiclePhoto"]['photo_redim'] = $photo['photo_redim'];
                  $this->Session->delete('qtde');
                   $this->Vehicle->VehiclePhoto->create();
                   $this->Vehicle->VehiclePhoto->save($data);
                }
             }
             exit;

            $this->Session->setFlash(__('Veículo criado com sucesso.', true));
            $this->redirect(array("action" => "index"));
          }
        }
      }

      //Carregar Dados
      $types = $this->Vehicle->Type->find('list');
      $types = array(0 => 'Selecione') + $types;

      $categories = $this->Vehicle->Category->find('list');
      $categories = array(0 => 'Selecione...') + $categories;

      $brands = $this->Brand->find('list',array(
      'order'=>'Brand.name'));
      $brands = array(0 => "Selecione...") + $brands;

      //Items
      $items = $this->Item->find('list',array(
        'conditions' => array('Item.name NOT LIKE' =>'Opcional%'),
        'recursive'=>  -1,
        'fields' => array('id','name')
      ));
      $items = array(0 => "Selecione...") + $items;

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

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Veículo Inválido', true));
        $this->redirect(array("action" => "index"));
		  }
		  if (!empty($this->data)) {
        //Salvar dados
		  }
		  if (empty($this->data)) {
        $this->data = $this->Vehicle->read(null, $id);
		  }
      //Carregar Dados
      $types = $this->Vehicle->Type->find('list');
      $types = array(0 => 'Selecione') + $types;

      $categories = $this->Vehicle->Category->find('list');
      $categories = array(0 => 'Selecione...') + $categories;

      $brands = $this->Brand->find('list',array(
      'order'=>'Brand.name'));
      $brands = array(0 => "Selecione...") + $brands;

      //Items
      $items = $this->Item->find('list',array(
        'conditions' => array('Item.name NOT LIKE' =>'Opcional%'),
        'recursive'=>  -1,
        'fields' => array('id','name')
      ));

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
      Configure::write ( 'debug', 0 );
      $idx = 1;
      $limite = Configure::read('File.max_qtde');
      $destination = Configure::read('File.destination_vehicles');

      if(!$this->Session->read('qtde')){
        $this->Session->write('qtde',$idx);
      }
      else
        $idx = $this->Session->read('qtde');

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
          //3. Verificar se nº de fotos enviadas é maior ou igual ao permitido
          if($idx <= $limite){
            //1. Foto original'
            $name_ori = "vehicle_ori_" . date('Ymdhis') . "_" . $idx . "." . $ext;

            //fazer upload do arquivo
            if(!copy($file['tmp_name'], $destination.$name_ori)){
              $erro = 'Não foi possível fazer upload do arquivo original';
            }

            //3. Foto Redimensionada'
            $name_redim = "vehicle_redim_".date('Ymdhis'). "_" . $idx . "." . $ext;
            $result = $this->Upload->upload($file, $destination, $name_redim, array('type' => 'resize', 'size' => array('380', '252'), 'output' => 'jpg'));

            if (!$result)  {

              echo $name_ori . ",". $name_redim;
              $idx++;
              $this->Session->write('qtde',$idx);
              } else {
                // display error
			          $errors = $this->Upload->errors;
              }

              // piece together errors
              if(is_array($errors)){
			          $erro = implode("/n",$errors);
              }
            } else {
              $erro = 'Número de imagens permitidas atingido';
           }
         }
      } else{
        $erro = 'Nenhuma imagem definida';
      }

      if(!empty($erro)){
        echo 'Erro:'.$erro;
      }
    }

    function delete_file(){
      $this->autoRender = false;
      Configure::write ( 'debug', 0 );
      $destination = Configure::read('File.destination_vehicles');
      //echo($this->data['file_ori']);
      //Apagar arquivo original
      if(file_exists($destination.$this->data['file_ori'])){
         unlink($destination.$this->data['file_ori']);
      }
      else{
        echo "Erro: Não foi possível apagar foto original";
        exit;
      }
      //Apagar arquivo redimensionado
       if(file_exists($destination.$this->data['file_redim'])){
         unlink($destination.$this->data['file_redim']);
       }
       else{
        echo "Erro: Não foi possível apagar foto redimensionada";
        exit;
      }
      //Apagar imagens do banco
     $this->Vehicle->VehiclePhoto->deleteAll(array(
       'photo_ori' =>  $this->data['file_ori'],
       'photo_redim' => $this->data['file_redim']
      )
     );
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

     public function get_opcoes($item_id = null){
      if($item_id){
        $this->autoRender = false;
        //Configure::write ( 'debug', 0 );
        $items = $this->ItemValue->find('list',array(
         'conditions' => array('item_id' => $item_id),
         'order' => 'ItemValue.name'
        ));

        $items = array(0 => "Selecione") + $items;
        if(!empty($items)){
          foreach($items as $key=>$value){
            $out[$key]['value'] = $key;
            $out[$key]['caption'] = $value;
          }

          return json_encode($out);
        }
      }
    }

   }
?>
