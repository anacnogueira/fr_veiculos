<!-- File: /app/View/Types/admin_edit.ctp -->
<h2>Tipos &raquo; Editar</h2>
<div class="types form">
<?php echo $this->Form->create('Type');?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
 <?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->end('Enviar');?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('Category.id')), null, sprintf('Tem certeza que deseja excluir o registro  # %s?', $this->Form->value('Type.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipos', true), array('action' => 'index'));?></li>
	</ul>
</div>