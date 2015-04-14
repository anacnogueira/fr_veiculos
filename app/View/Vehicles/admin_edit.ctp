<!-- File: /app/View/Vehicles/admin_edit.ctp -->
<?php
$script = $this->Html->script(array('jquery.selects','jquery.numeric','jquery.price_format.1.3',
  'jquery.mousewheel','jquery.fancybox','new','item','itemUI','vehicles',
  'jquery.maskedinput','mascara_campo','get_modelos','get_opcoes','ajaxupload','anexa_arquivos'))."\n";
 $script .= $this->Html->css(array('jquery.fancybox'));
 echo $this->addScript('scripts_for_layout',$script);
  echo $this->element('tiny_mce');
?>
<h2>Editar Veículo</h2>
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
  'required' => false,
  'selected' => $this->data['Vehicle']['type_id']
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
   'required' => false,
  'selected' => $this->data['Brand']['id']
  ))."\n"; ?>
<?php echo $this->Form->input('modelo_id',array(
'label'=>'Modelo:*',
'id'=>'VehicleModeloId',
'type'=>'select',
'requierd' => false))."\n"; ?>
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
   'S'=>'Sim'),array(
    'legend'=>false,
    'label'=>false,
    'default' => $this->data['Vehicle']['status'])); ?>
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
     <?php echo $tbl_itens; ?>
  </table>

</fieldset>

<fieldset>
  <legend>Opcionais 1</legend>

  <?php
   if(!empty($opcionais)){
    echo "<ul class='list'>";
    foreach($opcionais as $opcional){
     if($opcional['Item']['id'] == 9){
       echo "<li>". $this->Form->checkbox('item',array(
        'name'=>'item['.$opcional['Item']['id'].'][]',
        'value'=> $opcional['ItemValue']['id'],
        'hiddenField' => false,
        'checked' => ($opcional['ItemValue']['checked'] == 1 ? true : false)
        )) . $opcional['ItemValue']['name'] . "</li>";
     }
    }
    echo "</ul>";

   }
 ?>
</fieldset>
<fieldset>
  <legend>Opcionais 2</legend>
 <?php
   if(!empty($opcionais)){
    echo "<ul class='list'>";
    foreach($opcionais as $opcional){
     if($opcional['Item']['id'] == 10){
       echo "<li>". $this->Form->checkbox('item',array(
        'name'=>'item['.$opcional['Item']['id'].'][]',
        'value'=> $opcional['ItemValue']['id'],
        'hiddenField' => false,
        'checked' => $opcional['ItemValue']['checked']
        )) . $opcional['ItemValue']['name'] . "</li>";
     }
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
    <?php if(isset($this->data['VehiclePhoto'])): ?>
     <?php $idx = 0; ?>
    <?php foreach($this->data['VehiclePhoto'] as $idx => $item): ?>
     <div class="box">
      <?php echo $this->Html->image('/img/vehicles/'.$item['photo_redim'])."<br />\n"; ?>
      <?php echo $this->Form->hidden('',array('name'=>'data[VehiclePhoto]['.$idx.'][photo_ori]','value'=>$item['photo_ori']))."\n"; ?>
      <?php echo $this->Form->hidden('',array('name'=>'data[VehiclePhoto]['.$idx.'][photo_redim]','value'=>$item['photo_redim']))."\n"; ?>
      <?php echo $this->Form->button('Excluir',array('class'=>'btn_delete','type'=>'button'))."\n"; ?>
      <?php $idx++; ?>
     </div>
    <?php endforeach; ?>
    <?php endif; ?>
   </div>
   <div id='flashMessage'></div>
   </ul>
</fieldset>
<?php echo $this->Form->hidden('allItems');?>
<?php echo $this->Form->hidden('id');?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Veículos', true), array('action' => 'admin_index'));?></li>
	</ul>
</div>
