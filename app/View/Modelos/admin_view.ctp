<!-- File: /app/View/Modelos/admin_view.ctp -->  
<div class="modelos view">
<h2><?php  echo __('Modelosr');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $modelo['Modelo']['id']; ?>
			&nbsp;
		</dd>
    <dt><?php echo __('Marca:'); ?></dt>
		<dd>
			<?php echo $modelo['Brand']['name']; ?>
			&nbsp;
  	</dd>
		<dt><?php echo __('Modelo:'); ?></dt>
		<dd>
			<?php echo $modelo['Modelo']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Modelos', true), array('action' => 'edit', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir modelo', true), array('action' => 'delete', $modelo['Modelo']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $modelo['Modelo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Modelos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Modelo', true), array('action' => 'add')); ?> </li>
	</ul>
</div>