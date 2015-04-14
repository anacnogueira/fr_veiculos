<!-- File: /app/View/Brands/admin_add.ctp -->
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
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Marcas', true), array('action' => 'index'));?></li>
	</ul>
</div>