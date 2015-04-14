<!-- File: /app/View/brands/admin_view.ctp -->  
<div class="brands view">
<h2><?php  echo __('Marca');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $brand['Brand']['id']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo $brand['Brand']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Marca', true), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Marca', true), array('action' => 'delete', $brand['Brand']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Marcas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Marca', true), array('action' => 'add')); ?> </li>
	</ul>
</div>