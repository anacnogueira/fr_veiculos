<!-- File: /app/View/Categories/admin_view.ctp -->  
<div class="categories view">
<h2><?php  echo __('Categoria');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $category['Category']['id']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo $category['Category']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Categoria', true), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Categoria', true), array('action' => 'delete', $category['Category']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Categoria', true), array('action' => 'add')); ?> </li>
	</ul>
</div>