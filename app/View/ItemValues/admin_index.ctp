<!-- File: /app/View/ItemValues/admin_index.ctp -->
<div class="item_values index">
  <h2><?php echo __('Opcionais Valores');?></h2>
  <div class="filtro">
  <?php echo $this->Form->create(array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
  <table class="none">
    <tr>
      <td>Opcional:</td>
      <td><?php echo $this->Form->input('item_id'); ?></td>
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
    <li><?php echo $this->Html->link(__('Novo valor', true), array('action' => 'add')); ?></li>
	</ul>
</div>
 <p>Total de  <?php echo $count; ?> valores de opcionais encontrados </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('id','ID');?></th>
      <th><?php echo $this->Paginator->sort('Item.name','Opcional'); ?></th>
      <th><?php echo $this->Paginator->sort('ItemValue.name','Nome'); ?></th>
      <th class="actions"><?php __('Ações');?></th>
    </tr>
    <?php foreach($item_values as $value): ?>
    <tr>
      <td><?php echo $value['ItemValue']['id']; ?></td>
      <td><?php echo $value['Item']['name']; ?></td>
      <td><?php echo $value['ItemValue']['name']; ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $value['ItemValue']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $value['ItemValue']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $value['ItemValue']['id']), null, sprintf("Tem certeza que deseja excluir o registro # %d?", $value['ItemValue']['id'])); ?>
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
