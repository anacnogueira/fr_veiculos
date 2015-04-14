<!-- File: /app/View/Types/admin_view.ctp -->  
<div class="types view">
<h2><?php  echo __('Tipo');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $type['Type']['id']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo $type['Type']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tipo', true), array('action' => 'edit', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Tipo', true), array('action' => 'delete', $type['Type']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Tipo', true), array('action' => 'add')); ?> </li>
	</ul>
</div>