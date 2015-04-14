<!-- File: /app/View/Modelos/admin_edit.ctp -->  
<h2>Modelos &raquo; Editar</h2>
<div class="item_values form">
<?php echo $this->Form->create('Modelo');?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('brand_id',array('label'=>'Marca:'))."\n"; ?>
<?php echo $this->Form->input('name',array('label'=>'Modelo:','maxlength'=>'50'))."\n"; ?>
 <?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->end('Enviar');?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('Modelo.id')), null, sprintf('Tem certeza que deseja excluir o registro  # %s?', $this->Form->value('Modelo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Modelos', true), array('action' => 'index'));?></li>
	</ul>
</div>