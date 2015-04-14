<!-- File: /app/View/Vehicles/admin_add_brand.ctp -->
<?php
$script = $this->Html->script('vehicles');
 echo $this->addScript('scripts_for_layout',$script);
?>

<h2>Marcas &raquo; Cadastrar</h2>
<div class="marcas form">
<?php echo $this->Form->create('Brand');?>
<p>Os campos com * são obrigatórios</p>
 <?php echo $this->Form->input('name',array(
  'label'=>'Nome:',
  'maxlength'=>'50',
  'required' => false
 ))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div> 