<!-- File: /app/View/Types/admin_index.ctp -->
<div class="types index">
  <h2><?php echo __('Tipos de Veículos');?></h2>
  <div class="filtro">
  <?php echo $this->Form->create(array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
  <table class="none">
    <tr>
      <td>Nome:</td>
      <td><?php echo $this->Form->input('name'); ?></td>
      <td>Exibir:</td>
      <td>
        <?php echo $this->Form->input('qtde',array('type'=>'select','options'=>$qtde,'default'=>1)); ?>
        <?php echo $this->Form->submit('Pesquisar',array('div'=>false)); ?>
      </td>
    </tr>
  </table>
  </form>
</div>
  <div class="actions">
	<ul>
    <li><?php echo $this->Html->link(__('Novo Tipo', true), array('action' => 'add')); ?></li>
	</ul>
</div>
 <p>Total de  <?php echo $count; ?> tipos encontrados </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('id','ID');?></th>
      <th><?php echo $this->Paginator->sort('name','Nome'); ?></th>
      <th class="actions"><?php __('Ações');?></th>
    </tr>
    <?php foreach($types as $type): ?>
    <tr>
      <td><?php echo $type['Type']['id']; ?></td>
      <td><?php echo $type['Type']['name']; ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $type['Type']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $type['Type']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $type['Type']['id']), null, sprintf("Tem certeza que deseja excluir o registro # %d?", $type['Type']['id'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('Próximo', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
