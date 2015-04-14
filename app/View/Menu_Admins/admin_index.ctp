<!-- File: /app/View/Menu_Admins/admin_index.ctp -->  
<div class="menus index">
<h2><?php echo __('Itens do menu');?></h2>
<div class="filtro">
  <?php echo $this->Form->create('MenuAdmin',array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
  <table class="none">
    <tr>
      <td>Nome:</td>
      <td><?php echo $this->Form->input('nome'); ?></td>

    </tr>
    <tr>
      <td>Status:</td>
      <td><?php echo $this->Form->input('ativo',array('type'=>'select','options'=>$status)); ?></td>
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
		<li><?php echo $this->Html->link(__('Novo Item de menu', true), array('action' => 'admin_add')); ?></li>
	</ul>
</div>
<p>Total de  <?php echo $count; ?> items do menu encontrados </p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id','ID');?></th>
	<th><?php echo $this->Paginator->sort('nome','NOME');?></th>
	<th><?php echo $this->Paginator->sort('order','ORDEM');?></th>
  <th><?php echo $this->Paginator->sort('link','LINK');?></th>
  <th>STATUS</th>
	<th class="actions"><?php __('Ações');?></th>
</tr>
<?php
$i = 0;
foreach ($items as $item):

?>
	<tr>
		<td><?php echo $item['MenuAdmin']['id']; ?></td>
		<td><?php echo $item['MenuAdmin']['nome']; ?></td>
		<td><?php echo $item['MenuAdmin']['order']; ?></td>
    <td><?php echo $item['MenuAdmin']['link']; ?></td>
		<td><?php echo $this->Status->showCurrentStatus('MenuAdmins','ativo',$item['MenuAdmin']['ativo'],$item['MenuAdmin']['id']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'admin_view', $item['MenuAdmin']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'admin_edit', $item['MenuAdmin']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'admin_delete', $item['MenuAdmin']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $item['MenuAdmin']['id'])); ?>
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
