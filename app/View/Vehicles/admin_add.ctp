<!-- File: /app/View/Vehicles/admin_add.ctp -->
<?php
$script = $this->Html->script(array('jquery.selects','jquery.numeric','jquery.price_format.1.3',
  'jquery.mousewheel','jquery.fancybox','new','item','itemUI','vehicles',
  'jquery.maskedinput','mascara_campo','get_modelos','get_opcoes','ajaxupload','anexa_arquivos'))."\n";
 $script .= $this->Html->css(array('jquery.fancybox'));
 echo $this->addScript('scripts_for_layout',$script);
  echo $this->element('tiny_mce');
?>
<h2>Adicionar Veículo</h2>
<div class="mnu form">
<?php echo $this->Form->create('Vehicle',array('type'=>'file'));?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('name',array(
 'label'=>'Nome:*',
 'maxlength'=>'50',
 'required' => false
 ))."\n"; ?>
<?php echo $this->Form->input('plate',array(
 'label'=>'Placa:*',
 'class' => 'custom',
 'size'=>'8',
 'maxlength'=>'8',
 'required' => false
 ))."\n"; ?>
<?php echo $this->Form->input('type_id',array(
  'label'=>'Tipo:*',
  'type'=>'select',
  'required' => false
))."\n"; ?>
<?php echo $this->Form->input('category_id',array(
'label'=>'Categoria:*',
'type'=>'select',
'required'=>false))."\n"; ?>
<?php echo $this->Form->input('brand_id',array(
  'label'=>'Marca:*',
  'id'=>'VehicleBrandId',
  'type'=>'select',
  'options'=>$brands,
  'required' => false))."\n"; ?>
<?php echo $this->Form->input('modelo_id',array(
'label'=>'Modelo:*',
'id'=>'VehicleModeloId',
'type'=>'select',
'required' => false))."\n"; ?>
<?php echo $this->Form->input('manufacturing_year',array(
'label'=>'Ano fabricação:*',
'type'=>'text',
'size'=>'4',
'maxlength'=>'4',
'class'=>'custom onlyNumbers',
'required'=> false)); ?>
<?php echo $this->Form->input('model_year',array(
'label'=>'Ano modelo:*',
'type'=>'text',
'size'=>'4',
'maxlength'=>'4',
'class'=>'custom onlyNumbers',
'required' => false)); ?>
<?php echo $this->Form->input('kilometrage',array(
'label'=>'Kilometragem:',
'type'=>'text',
'size'=>10,
'class'=>'custom onlyNumbers',
'required'=>false)); ?>
<?php echo $this->Form->input('price',array(
'label'=>'Valor:*',
'type'=>'text',
'class'=>'custom valor',
'size'=>10,
'required'=>false)); ?>
<?php echo $this->Form->input('obs',array(
'label'=>'Observação:',
'type'=>'textarea')); ?>

<label>Ativo:*</label>
  <?php echo $this->Form->radio('ativo',array(
   'N'=>'Não',
   'S'=>'Sim'),array('legend'=>false,'label'=>false)); ?>
 <?php echo $this->Form->error('ativo'); ?>
<fieldset>
  <legend>Itens</legend>
  <?php echo $this->Form->input('Item.name',array(
    'label'=>'Item:',
    'type'=>'select',
    'required' => false,
    'options' => $items,
    )); ?>
  <?php echo $this->Form->input('ItemValue.name',array(
    'label'=>'Opções:',
    'type' => 'select',
    'required' => false)); ?>
   <br />
   <?php echo $this->Form->button('Adicionar',array('type'=>'button','class'=>'btnAdd')); ?>
   <?php echo $this->Form->button('Editar',array('type'=>'button','class'=>'btnEdit')); ?>
   <?php echo $this->Form->button('Excluir',array('type'=>'button','class'=>'btnDelete')); ?>
  <br /><br />
  <table width="100%" cellpadding="0" cellspacing="0" class="defaultTable" id='tbl_itens'>
     <tr>
      <th scope="col"><input type="checkbox" name="checkboxItem[]" class="allBox" /></th>
      <th scope="col">Item</th>
      <th scope="col">Opção</th>
     </tr>
  </table>
</fieldset>

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
    <li>Insira até <?php echo Configure::read('File.max_qtde'); ?> fotos</li>
    <li>Extensões permitidas: jpg, jpeg, png e gif</li>
    <li>Cada imagem não deve ultrapassar <?php echo Configure::read('File.max_file_size_txt'); ?></li>

     <label for="ImovelFoto">Foto:</label>
    <?php echo $this->Form->file('Vehicle.photo',array('id'=>'VehiclePhoto','class'=>'custom','size'=>50)); ?>

   <div id="list_images">
    <?php if(isset($this->data['Vehicle']['foto_img'])): ?>
    <?php $idx = 0; ?>
    <?php foreach($this->data['Vehicle']['foto_img'] as $item): ?>
     <div class="box">
      <?php echo $this->Html->image('/img/vehicles/'.$item)."<br />\n"; ?>
      <?php echo $this->Form->hidden('',array('name'=>'data[Vehicle][photo_img][]','value'=>$item,'id'=>'VehiclePhotoId'.$idx))."\n"; ?>
      <?php echo $this->Form->button('Excluir',array('onclick'=>'delete_image(this)'))."\n"; ?>
      <?php $idx++; ?>
     </div>
    <?php endforeach; ?>
    <?php endif; ?>
   </div>
   <div id='flashMessage'></div>
   </ul>
</fieldset>
<?php echo $this->Form->hidden('allItems');?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Veículos', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
