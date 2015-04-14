<!-- File: /app/View/Schedules/admin_view.ctp -->  
<div class="schedules view">
<h2><?php  echo __('Agendamento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Veículo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Vehicle']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nome:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['name']; ?>
			&nbsp;
  	</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('E-mail:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['email']; ?>
			&nbsp;
  	</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Telefone:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['telephone']; ?>
			&nbsp;
  	</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mensagem:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['message']; ?>
			&nbsp;
  	</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Data:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['date']; ?>
			&nbsp;
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Hora:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['hour']; ?>
			&nbsp;
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Data Criação:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $schedule['Schedule']['created']; ?>
			&nbsp;

  	</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Agendamento', true), array('action' => 'edit', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Agendamento', true), array('action' => 'delete', $schedule['Schedule']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Agendamentos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Agendamento', true), array('action' => 'add')); ?> </li>
	</ul>
</div>