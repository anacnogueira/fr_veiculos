<!-- File: /app/View/Schedules/index.ctp -->
<div class="agendamentos index">
  <h2><?php __('Agendamentos');?></h2>
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
  
    <?php foreach($agendamentos as $agendamento): ?>
    <tr>
      <td><?php echo $agendamento['Agendamento']['name']; ?></td>
      <td><?php echo $agendamento['Agendamento']['email']; ?></td>
      <td><?php echo $agendamento['Agendamento']['telephone']; ?></td>
       <td><?php echo $agendamento['Agendamento']['date']; ?></td>
        <td><?php echo $agendamento['Agendamento']['hour']; ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $agendamento['Agendamento']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $agendamento['Agendamento']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $agendamento['Agendamento']['id']), null, sprintf(__('Tem certeza que deseja excluir o registro # %s?', true), $category['Category']['id'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
