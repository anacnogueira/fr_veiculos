<!-- File: /app/View/Pages/index.ctp -->  
<div class="sections">
  <div class="carros">
    <h1>Carros</h1>
     <?php foreach($cars as $car): ?>
     <div>
      <?php
        $slug_name = Inflector::slug($car['Vehicle']['name'],'-');
        $url =  '/'.$car['Type']['name'].'/'.$car['Vehicle']['id'].'/'.$slug_name;
        if(!empty($car['VehiclePhoto'])){
        $directory = 'vehicles';
        echo $this->Html->image($directory . '/' .$car['VehiclePhoto'][0]['photo_redim'],array(
           'class'=>'thumb',
           'alt' => $car['Vehicle']['name'],
          'title' => $car['Vehicle']['name'],
          'url' => $url
        ));
      }
       ?>
       <h4><?php echo $this->Html->link($car['Vehicle']['name'],$url); ?></h4>
       <span class="year"><?php echo $car['Vehicle']['manufacturing_year']. "/" . $car['Vehicle']['model_year'] . " - " . $car['Brand']['name']; ?></span>
       <span class="price">R$ <?php echo str_replace(".",",",$car['Vehicle']['price']); ?></span>
    </div>
    <?php endforeach; ?>
    <?php echo $this->Html->link('Veja Mais',$this->Html->url( '/carros', true )); ?>
  </div>
  <div class="motos">
    <h1>Motos</h1>
    <?php foreach($motos as $moto): ?>
     <div>
       <?php
        $slug_name = Inflector::slug($moto['Vehicle']['name'],'-');
        $url =  '/'.$moto['Type']['name'].'/'.$moto['Vehicle']['id'].'/'.$slug_name;
        if(!empty($moto['VehiclePhoto'])){
        $directory = 'vehicles';
        echo $this->Html->image($directory . '/' .$moto['VehiclePhoto'][0]['photo_redim'],array(
           'class'=>'thumb',
           'alt' => $moto['Vehicle']['name'],
          'title' => $moto['Vehicle']['name'],
          'url' => $url
        ));
      }
       ?>
       <h4><?php echo $this->Html->link($moto['Vehicle']['name'],$url); ?></h4>
       <span class="year"><?php echo $moto['Vehicle']['manufacturing_year']. "/" . $moto['Vehicle']['model_year'] . " - " . $moto['Brand']['name']; ?></span>
       <span class="price">R$ <?php echo str_replace(".",",",$moto['Vehicle']['price']); ?></span>
    </div>
    <?php endforeach; ?>
    <?php echo $this->Html->link('Veja Mais',$this->Html->url( '/motos', true )); ?>
  </div>
  <div class="news">
    <h1>Notícias</h1>
    <?php foreach($news as $new): ?>
     <div>
      <?php
         $slug_name = Inflector::slug($new['News']['title'],'-');
         $url =  '/noticia/'.$new['News']['id'].'/'.$slug_name;
         if(!empty($new['News']['image'])){
        $directory = 'news';
        echo $this->Html->image($directory . '/' .$new['News']['image'],array(
          'class'=>'thumb',
          'alt' => $new['News']['title'],
          'title' => $new['News']['title'],
          'url' => $url
        ));
      }
       ?>
       <h4><?php echo $this->Html->link($new['News']['title'],$url); ?></h4>
       <p><?php echo strip_tags($this->Text->excerpt($new['News']['content'],null, 60,'...')); ?></p>
    </div>
    <?php endforeach; ?>
    <?php echo $this->Html->link('Veja Mais',$this->Html->url( '/noticias', true )); ?>
  </div>
</div>