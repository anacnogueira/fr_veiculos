<!-- File: /app/View/Items/admin_edit.ctp -->  
<h2>Items &raquo; Editar</h2>
<div class="items form">
<?php echo $this->Form->create('Item');?>
<p>Os campos com * são obrigatórios</p>
<?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
 <?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->end('Enviar');?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('Item.id')), null, sprintf('Tem certeza que deseja excluir o registro  # %s?', $this->Form->value('Item.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Opcionais', true), array('action' => 'index'));?></li>
	</ul>
</div>