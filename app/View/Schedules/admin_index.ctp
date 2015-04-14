<!-- File: /app/View/Schedules/index.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<div class="agendamentos index">
  <h2><?php echo __('Agendamentos');?></h2>
  <div class="filtro">
   <?php echo $this->Form->Create('Schedule',array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
   <table class="none">
    <tr>
      <td>Nome:</td>
      <td><?php echo $this->Form->input('name'); ?></td>
      <td>Data:</td>
       <td>de <?php echo $this->Form->input('date_from',array('class'=>'data')); ?>
        até <?php echo $this->Form->input('date_to',array('class'=>'data')); ?></td>

      <td>Exibir:</td>
      <td>
        <?php echo $this->Form->input('qtde',array('type'=>'select','options'=>$qtde,'default'=>1)); ?>
        <?php echo $this->Form->submit('Pesquisar',array('div'=>false)); ?>
      </td>
    </tr>

  </table>

   <?php echo $this->Form->End(); ?>
  </div>
  <div class="actions">
	<ul>
    <li><?php echo $this->Html->link(__('Novo Agendamento', true), array('action' => 'add')); ?></li>
	</ul>
</div>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Telefone</th>
      <th>Data</th>
      <th>Hora</th>
      <th class="actions"><?php __('Ações');?></th>
    </tr>

    <?php foreach($schedules as $schedule): ?>
    <tr>
      <td><?php echo $schedule['Schedule']['name']; ?></td>
      <td><?php echo $schedule['Schedule']['email']; ?></td>
      <td><?php echo $schedule['Schedule']['telephone']; ?></td>
       <td><?php echo $schedule['Schedule']['date']; ?></td>
        <td><?php echo substr($schedule['Schedule']['hour'],0,5); ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $schedule['Schedule']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $schedule['Schedule']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $schedule['Schedule']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $schedule['Schedule']['id'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
