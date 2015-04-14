<!-- File: /app/View/Modelos/admin_index.ctp -->
<div class="modelos index">
  <h2><?php echo __('Modelos');?></h2>
  <div class="filtro">
  <?php echo $this->Form->create(array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
  <table class="none">
    <tr>
      <td>Marca:</td>
      <td><?php echo $this->Form->input('brand_id'); ?></td>
      <td>Modelo:</td>
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
    <li><?php echo $this->Html->link(__('Novo modelo', true), array('action' => 'add')); ?></li>
	</ul>
</div>
 <p>Total de  <?php echo $count; ?> modelos encontrados </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('id','ID');?></th>
      <th><?php echo $this->Paginator->sort('Brand.name','Marca'); ?></th>
      <th><?php echo $this->Paginator->sort('Modelo.name','Modelo'); ?></th>
      <th class="actions"><?php __('Ações');?></th>
    </tr>
    <?php foreach($modelos as $modelo): ?>
    <tr>
      <td><?php echo $modelo['Modelo']['id']; ?></td>
      <td><?php echo $modelo['Brand']['name']; ?></td>
      <td><?php echo $modelo['Modelo']['name']; ?></td>
      <td class="actions">
			  <?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $modelo['Modelo']['id'])); ?>
			  <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $modelo['Modelo']['id'])); ?>
			  <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $modelo['Modelo']['id']), null, sprintf("Tem certeza que deseja excluir o registro # %d?", $modelo['Modelo']['id'])); ?>
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
