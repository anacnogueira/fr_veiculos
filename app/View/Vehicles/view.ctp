<!-- File: /app/View/Vehicles/view.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo','jquery.galleriffic','jquery.opacityrollover.js','config_galeria.js'))."\n";
 $script .= $this->Html->css(array('galleriffic-2'));
 echo $this->addScript('scripts_for_layout',$script);

?>
<div class='title_vehicle'>
  <h1><?php echo $title_for_layout; ?></h1>
<h2>
  <?php echo $vehicle['Vehicle'] ['manufacturing_year'].'/'. $vehicle['Vehicle'] ['model_year']; ?>
  - <?php echo $vehicle['Category']['name']; ?>
</h2>
</div>

<!-- GALERIA DE FOTOS -->
<?php if(!empty($vehicle['VehiclePhoto'])): ?>
<div class='galeria'>
     <div id="thumbs" class="navigation">
      <ul class="thumbs noscript">
        <?php  foreach($vehicle['VehiclePhoto'] as $photo): ?>
            <li><?php echo $this->Html->link(
                 $this->Html->Image('vehicles/'.$photo['photo_redim']),
                  '/img/vehicles/'.$photo['photo_redim'],
                  array('class' => 'thumb',
                  'escape' => false)); ?>
              <div class="caption">

              </div>
           </li>
        <?php endforeach; ?>
  </ul>
</div>
  <div id="gallery" class="content">
    <div id="controls" class="controls"></div>
      <div class="slideshow-container">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
      </div>
      <div id="caption" class="caption-container"></div>
  </div>

</div>

<?php endif; ?>

<div class='info'>
  <p class="price">R$ <?php echo  number_format($vehicle['Vehicle']['price'],2,",","."); ?></p>

  <?php
    if(!empty($vehicle['Vehicle']['kilometrage'])){
     echo "<p>Kilometragem: <b>".$vehicle['Vehicle']['kilometrage']."</b></p>";
    }
  ?>
  <?php if(!empty($items)){
      foreach($items as $name => $value){
        echo "<p>".$name.": <b>".$value."</b></p>";
      }
  } ?>
  <?php
    //Opcionais 2
    if(!empty($options['Opcional2'])){
      echo "<br /><div class='opt2'><ul>";
      foreach($options['Opcional2'] as $opt2){
        echo "<li>".$opt2."</li>";
      }
      echo "</ul></div>";
    }

  ?>

  <?php
    //Opcionais 1
    if(!empty($options['Opcional1'])){
      echo "<br /><div class='opt1'><ul>";
      foreach($options['Opcional1'] as $opt1){
        echo "<li>".$opt1."</li>";
      }
      echo "</ul></div>";
    }

  ?>
</div>
<div class='agendar'>
  <?php
    if(!empty($vehicle['Vehicle']['obs'])){
     echo $vehicle['Vehicle']['obs'] . "<br />";
    }
   ?>
  <h2>Agendar visita ao veículo</h2>
  <?php
    echo $this->Form->create('Schedule',array('url' =>  '/veiculo-formulario-enviado'));
    echo "<div class='form_col'>";
    echo $this->Form->input('name',array('label'=>'Nome*:','maxlength'=>50));
    echo $this->Form->input('email',array('label'=>'E-mail*:','maxlength'=>50));
    echo $this->Form->input('telephone',array('label'=>'Telefone:','class'=>'telefone'));
    echo $this->Form->input('message',array('label'=>'Mensagem:','type'=>'textarea'));
    echo "</div>";
    echo "<div class='form_col'>";
    echo $this->Form->input('date',array('label'=>'Data*:','type'=>'text','class'=>'data'));
    echo $this->Form->input('hour',array('label'=>'Horário*:','type'=>'text','class'=>'hora'));
    echo "<ul>";
    echo "<li>". $this->Form->checkbox('info_add',array(
      'name'=>'info_add[]',
      'value'=> 'Gostaria de financiar',
      'hiddenField' => false

     )) . 'Gostaria de financiar' . "</li>";

   echo "<li>". $this->Form->checkbox('info_add',array(
      'name'=>'info_add[]',
      'value'=> 'Quero receber cópia desta proposta',
      'hiddenField' => false

     )) . 'Quero receber cópia desta proposta' . "</li>";

   echo "<li>". $this->Form->checkbox('info_add',array(
      'name'=>'info_add[]',
      'value'=> 'Tenho veículo para dar na troca',
      'hiddenField' => false

     )) . 'Tenho veículo para dar na troca' . "</li>";
    echo "</ul>";
    echo "</div>";
    echo $this->Form->hidden('url',array('value'=>$this->params->url));
    echo $this->Form->hidden('vehicle_id',array('value'=>$vehicle['Vehicle']['id']));
    echo $this->Form->submit('btn_send.jpg');
    echo $this->Form->end();
  ?>
</div>