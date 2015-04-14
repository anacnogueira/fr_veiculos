<!-- File: /app/View/ItemValues/admin_view.ctp -->  
<div class="item_values view">
<h2><?php  echo __('Opcional valor');?></h2>
	<dl>
		<dt><?php echo __('ID:'); ?></dt>
		<dd>
			<?php echo $value['ItemValue']['id']; ?>
			&nbsp;
		</dd>
    <dt><?php echo __('Opcional:'); ?></dt>
		<dd>
			<?php echo $value['Item']['name']; ?>
			&nbsp;
  	</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo $value['ItemValue']['name']; ?>
			&nbsp;
  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Valor de Opcional', true), array('action' => 'edit', $value['ItemValue']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir valor de Opcional', true), array('action' => 'delete', $value['ItemValue']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $value['ItemValue']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Opcionais Valores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Valor', true), array('action' => 'add')); ?> </li>
	</ul>
</div>