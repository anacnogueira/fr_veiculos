<!-- File: /app/View/Vehicles/admin_add.ctp --> 
<?php
$script = $this->Html->script(array('jquery.selects','jquery.numeric','jquery.price_format.1.3',
  'jquery.maskedinput','mascara_campo','get_modelos','ajaxupload','anexa_arquivos'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<h2>Adicionar Veículo</h2>
<div class="mnu form">
<?php echo $this->Form->create('Vehicle',array('type'=>'file'));?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('name',array(
 'label'=>'Nome*:',
 'maxlength'=>'50',
 'required' => false
 ))."\n"; ?>
<?php echo $this->Form->input('type_id',array(
  'label'=>'Tipo*:',
  'type'=>'select',
  'required' => false
))."\n"; ?>
<?php echo $this->Form->input('category_id',array('label'=>'Categoria*:','type'=>'select'))."\n"; ?>
<?php echo $this->Form->input('brand_id',array('label'=>'Marca:','id'=>'VehicleBrandId','type'=>'select','options'=>$brands))."\n"; ?>
<?php echo $this->Form->input('modelo_id',array('label'=>'Modelo*:','id'=>'VehicleModeloId','type'=>'select','disabled'=>'disabled'))."\n"; ?>
<?php echo $this->Form->input('manufacturing_year',array('label'=>'Ano fabricação:','type'=>'text','size'=>'4','maxlength'=>'4','class'=>'custom onlyNumbers')); ?>
<?php echo $this->Form->input('model_year',array('label'=>'Ano modelo:','type'=>'text','size'=>'4','maxlength'=>'4','class'=>'custom onlyNumbers')); ?>
<?php echo $this->Form->input('kilometrage',array('label'=>'Kilometragem:','type'=>'text','size'=>10,'class'=>'custom onlyNumbers')); ?>
<?php echo $this->Form->input('price',array('label'=>'Valor:','type'=>'text','class'=>'custom valor','size'=>10)); ?>
<?php foreach($items as $key => $item){
   echo $this->Form->input('item.'.$item['Item']['id'],array('label'=>$item['Item']['name'],'type'=>'select','options'=>$item['ItemValue']));

}
?>
 <label>Ativo:*</label>
  <?php echo $this->Form->radio('ativo',array(
   'N'=>'Não',
   'S'=>'Sim'),array('legend'=>false,'label'=>false)); ?>
 <?php echo $this->Form->error('ativo'); ?>
<fieldset>
  <legend>Opcionais 1</legend>
  <?php
   if(!empty($opcionais1)){
    echo "<ul class='list'>";
    foreach($opcionais1 as $opcional1){
     echo "<li>". $this->Form->checkbox('item',array(
      'name'=>'item['.$opcional1['Item']['id'].'][]',
      'value'=> $opcional1['ItemValue']['id'],
      'hiddenField' => false

     )) . $opcional1['ItemValue']['name'] . "</li>";

    }
    echo "</ul>";

   }
 ?>
</fieldset>
<fieldset>
  <legend>Opcionais 2</legend>
  <?php
   if(!empty($opcionais2)){
    echo "<ul class='list'>";
    foreach($opcionais2 as $opcional2){
     echo "<li>". $this->Form->checkbox('item',array(
      'name'=>'item['.$opcional2['Item']['id'].'][]',
      'value'=> $opcional2['ItemValue']['id'],
      'hiddenField' => false

     )) . $opcional2['ItemValue']['name'] . "</li>";

    }
    echo "</ul>";

   }
 ?>
</fieldset>

<fieldset>
  <legend>Fotos</legend>
  <p><strong>Instruções para inserção da foto:</strong></p>
  <ul>
    <li>Insira até 8 fotos</li>
    <li>Extensões perminitas: jpg, jpeg, png e gif</li>
    <li>Cada imagem não deve ultrapassar 4MB</li>

     <label for="ImovelFoto">Foto:</label>
    <?php echo $this->Form->file('Vehicle.photo',array('id'=>'VehiclePhoto','class'=>'custom','size'=>50)); ?>

   <div id="list_images">
    <?php if(isset($this->data['Vehicle']['foto_img'])): ?>
    <?php $idx = 0; ?>
    <?php foreach($this->data['Vehicle']['foto_img'] as $item): ?>
     <div class="box">
      <?php echo $this->Html->image('/img/vehicles/'.$item)."<br />\n"; ?>
      <?php echo $form->hidden('',array('name'=>'data[Vehicle][photo_img][]','value'=>$item,'id'=>'VehiclePhotoId'.$idx))."\n"; ?>
      <?php echo $form->button('Excluir',array('onclick'=>'delete_image(this)'))."\n"; ?>
      <?php $idx++; ?>
     </div>
    <?php endforeach; ?>
    <?php endif; ?>
   </div>
   <div id='flashMessage'></div>
   </ul>
</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Veículos', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
