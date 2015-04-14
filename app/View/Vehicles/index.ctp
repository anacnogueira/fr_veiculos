<!-- File: /app/View/Vehicles/index.ctp -->
<h1><?php echo $title_for_layout; ?></h1>
<?php
  if($vehicles){
    //pr($vehicles);

  echo "<div class='sections'>";
    foreach($vehicles as $vehicle){
      echo "<div>";
      $slug_name = Inflector::slug($vehicle['Vehicle']['name'],'-');
      $url =  '/'.$vehicle['Type']['name'].'/'.$vehicle['Vehicle']['id'].'/'.$slug_name;
      if(!empty($vehicle['VehiclePhoto'])){
        $directory = 'vehicles';
        echo $this->Html->image($directory . '/' .$vehicle['VehiclePhoto'][0]['photo_redim'],array(
          'class'=>'thumb',
          'alt' => $vehicle['Vehicle']['name'],
          'title' => $vehicle['Vehicle']['name'],
          'url' => $url
        ));
      }
      echo "<h4>".$this->Html->link($vehicle['Vehicle']['name'],$url) . '</h4>';
      echo "<p class='year'>".$vehicle['Vehicle']['manufacturing_year']. "/" . $vehicle['Vehicle']['model_year'] . " - " . $vehicle['Brand']['name'] . "</p>";
      echo "<p class='price'>R$ ".str_replace(".",",",$vehicle['Vehicle']['price']) . "</p>";
      echo "</div>";
    }
   echo "</div>";
   //Paginação
    echo $this->Element('paging');
  }
  else{
    echo "<p>Nenhum veículo encontrado para esta busca</p>";
  }
 ?>
