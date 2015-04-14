<!-- File: /app/View/Modelos/admin_add.ctp -->  
<h2>Modelos &raquo; Cadastrar</h2>
<div class="modelos form">
<?php echo $this->Form->create('Modelo');?>
<p>Os campos com * são obrigatórios</p>
 <?php echo $this->Form->input('brand_id',array('label'=>'Marca:'))."\n"; ?>
 <?php echo $this->Form->input('name',array('label'=>'Modelo:','maxlength'=>'50'))."\n"; ?>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Modelos', true), array('action' => 'index'));?></li>
	</ul>
</div>