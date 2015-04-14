<?php
  class NewsController extends AppController{

     public $name = 'News';

     /* Área restrita */
     public function admin_index(){
       //Filtrar condições
       $conditions = array();
       if(empty($this->data))
          $index_qtde = 1;
      else
        $index_qtde  = $this->data['News']['qtde'];

      //Filtrar por titul da notícia
      if(!empty($this->data['News']['title'])){
        $conditions['title LIKE'] = '%'.$this->data['News']['title'].'%';
      }
        //Data de publicação da notícia
         if(!empty($this->data['News']['date_from']) && empty($this->data['News']['date_to'])){
          $date_from = parent::format_date($this->data['News']['date_from'],2);
          $conditions['date_published >='] = $date_from;
        }
        if(empty($this->data['News']['date_from']) && !empty($this->data['News']['date_to'])){
          $valor_to = parent::format_date($this->data['News']['date_to'],2);
          $conditions['date_published <='] = $date_to;
        }
        if(!empty($this->data['News']['date_from']) && !empty($this->data['News']['date_to'])){
          $date_from = parent::format_date($this->data['News']['date_from'],2);
          $date_to = parent::format_date($this->data['News']['date_to'],2);
          $conditions['date_published  BETWEEN ? AND ?'] = array($date_from,$date_to);
        }

       //Settings
       $this->paginate = array(
      'limit'=>$this->qtde[$index_qtde],
      'conditions' => array($conditions),
      );
      $news = $this->paginate('News');
      $count = $this->News->find('count',array('conditions'=>$conditions));

      for($i=0;$i<count($news);$i++){
        $news[$i]['News']['date_published'] = parent::format_date($news[$i]['News']['date_published'],1);
      }
      $this->set(compact('news','count'));
    }

    public function admin_add(){
      $this->set("title_for_layout","Notícia &raquo; Nova notícia");
      $destination = Configure::read('File.destination_news');

      if (!empty($this->data)) {


			  $this->News->set($this->data);
        //if ($this->News->validates()) {
          $data = $this->data;
          $data['News']['date_published'] = parent::format_date($data['News']['date_published'],2);


            if(!empty($this->data['News']['upload']['name'])){
              $file = $this->data['News']['upload'];
              $ext = end(explode('.',$this->data['News']['upload']['name']));
              $id = $this->News->id;
              $result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('400', '300'), 'output' => $ext, 'quality' => '80'));

              //Atualiza campo foto no banco
              $data['News']['image'] = $this->Upload->result;
            }

            $this->News->create(true);
            if($this->News->save($data)){
             $this->Session->setFlash('Notícia adicionada com sucesso');
					   $this->redirect('index');
            }
				  //} else {
           //pr($this->News->validationErrors);
           //$this->Session->setFlash('Preencha os campos corretamente');
          //}
			  }
     }

     public function admin_edit($id = null){
      $this->set("title_for_layout","Notícia &raquo; Editar notícia");
      $destination = Configure::read('File.destination_news');

      if (!$id && empty($this->data)) {
        $this->Session->setFlash(__('Notícia Inválida', true));
        $this->redirect(array("action" => "index"));
		  }

      if (!empty($this->data)) {
         $data = $this->data;
          $data['News']['date_published'] = parent::format_date($data['News']['date_published'],2);
       if(!empty($this->data['News']['upload']['name'])){
          //Buscar e pagar arquivo antigo
          $image = $this->News->findById($this->data['News']['id']);
          $file_old = $image['News']['image'];
          unlink($destination."/".$file_old);

          //Salvar novo arquivo
          $file = $this->data['News']['upload'];
          $ext = end(explode('.',$file['name']));
          $result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('400', '300'), 'output' => $ext, 'quality' => '80'));
          $data['News']['image'] = $this->Upload->result;
        }
        $this->News->create(false);

        if ($this->News->save($data)) {
				  $this->Session->setFlash(__('A notícia foi salva.', true));
          $this->redirect(array('action'=>'index'));
			  } else {
          //$this->Session->setFlash(__('Não foi possível editar notícia.', true));
          //$this->redirect(array('controller'=>'news','action'=>'admin_index'));
			  }
		  }
		  if (empty($this->data)) {
        $data = $this->News->read(null, $id);
        $data['News']['date_published'] = parent::format_date($data['News']['date_published'],1);
        $this->data = $data;
		  }
    }

    public function admin_view($id = null){
     $this->set("title_for_layout","Notícia &raquo; Visualizar");

      if (!$id) {
			  $this->Session->setFlash(__('Notícia Inválida', true));
        $this->redirect(array('controller'=>'news','action'=>'admin_index'));
		  }
      $news =  $this->News->read(null, $id);
      $news['News']['date_published'] = parent::format_date($news['News']['date_published'],1);
      $this->set(compact('news'));
     }

    public function admin_delete($id = null){
      $destination = Configure::read('File.destination_news');
      if (!$id) {
			  $this->Session->setFlash(__('Notícia Inválida', true));
        $this->redirect(array("action" => "admin_index"));
		  }
      //Selecionar imagem para excluir
      $foto = $this->News->find('first',array('fields'=>array('News.image'),
      'conditions'=>array('News.id'=>$id)));
      $file = $foto['News']['image'];

      //Excluir foto da pasta
      unlink($destination."/".$file);

      if ($this->News->delete($id)) {
        $this->flash(__('Notícia excluída', true), array('action'=>'admin_index'));
        $this->redirect(array("action" => "admin_index"));
		  }
    }

     public function index(){
      $this->paginate = array(
      'conditions' => array('date_published <= NOW()'),
      'order'=>array('News.datepublished' => 'DESC','News.id' => 'DESC'),
      'limit'=>9,

      );

      $news = $this->paginate('News');
      //print_r($news);
      $this->set(compact('news'));

      $title_for_layout = " Notícias";
      $this->set(compact('title_for_layout'));

     }
     public function view(){
       $id = $this->params->id;
        if (!$id) {
			  $this->Session->setFlash(__('Notícia Inválida', true));

		  }
      $news =  $this->News->read(null, $id);
      $news['News']['date_published'] = parent::format_date($news['News']['date_published'],1);
      $this->set(compact('news'));

      $title_for_layout = " ".$news['News']["title"];
      $this->set(compact('title_for_layout'));

     }

   }
?>
