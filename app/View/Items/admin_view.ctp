<!-- File: /app/View/Items/admin_view.ctp -->  
<div class="items view">
<h2><?php  echo __('Opcional');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $item['Item']['id']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo $item['Item']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Opcional', true), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Opcional', true), array('action' => 'delete', $item['Item']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Opcionais', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Opcional', true), array('action' => 'add')); ?> </li>
	</ul>
</div>