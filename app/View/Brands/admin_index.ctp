<!-- File: /app/View/Brands/admin_index.ctp -->
<div class="brands index">
  <h2><?php echo __('Marcas');?></h2>
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
    <li><?php echo $this->Html->link(__('Nova Marca', true), array('action' => 'add')); ?></li>
	</ul>
</div>
 <p>Total de  <?php echo $count; ?> marcas encontradas </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('id','ID');?></th>
      <th><?php echo $this->Paginator->sort('name','Nome'); ?></th>
      <th class="actions"><?php __('Ações');?></th>
    </tr>
    <?php foreach($brands as $brand): ?>
    <tr>
      <td><?php echo $brand['Brand']['id']; ?></td>
      <td><?php echo $brand['Brand']['name']; ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $brand['Brand']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $brand['Brand']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $brand['Brand']['id']), null, sprintf("Tem certeza que deseja excluir o registro # %d?", $brand['Brand']['id'])); ?>
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
