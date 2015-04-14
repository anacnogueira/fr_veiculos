<!-- File: /app/View/Schedules/admin_edit.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<h2>Agendamento &raquo; Cadastrar</h2>
<div class="categorias form">
<?php echo $this->Form->create('Schedule');?>
<p>Os campos com * são obrigatórios</p>
 <?php echo $this->Form->input('vehicle_id',array('label'=>'Veículo:'))."\n"; ?>
 <?php echo $this->Form->input('name',array('label'=>'Nome:','maxlength'=>'50'))."\n"; ?>
 <?php echo $this->Form->input('email',array('label'=>'E-mail:','maxlength'=>'50'))."\n"; ?>
 <?php echo $this->Form->input('telephone',array('label'=>'Telefone:','class'=>'telefone'))."\n"; ?>
 <?php echo $this->Form->input('message',array('label'=>'Mensagem:','type'=>'textarea'))."\n"; ?>
 <?php echo $this->Form->input('date',array('type'=>'text','label'=>'Data:','class'=>'data'))."\n"; ?>
 <?php echo $this->Form->input('hour',array('type'=>'text','label'=>'Hora:','class'=>'hora'))."\n"; ?>
<p><?php echo $this->Form->checkbox('options',
    array('value'=>'quero_financiar','label'=>false)); ?>
   Quero Financiar </p>
  <p> <?php echo $this->Form->checkbox('options',
    array('value'=>'quero_trocar','label'=>false)); ?>
   Tenho veículo para dar na troca</p>
  <p> <?php echo $this->Form->checkbox('options',
    array('value'=>'quero_proposta','label'=>false)); ?>
   Quero receber cópia desta proposta</p>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->end('Enviar');?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('Schedule.id')), null, sprintf(__('Tem certeza que deseja excluir o registro  # %s?', true), $this->Form->value('Schedule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Agendamentos', true), array('action' => 'index'));?></li>
	</ul>
</div>