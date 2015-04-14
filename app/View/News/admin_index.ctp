<!-- File: /app/View/News/admin_index.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
 <div class="news index">
<h2><?php echo __('Notícias');?></h2>
<div class="filtro">
   <?php echo $this->Form->Create('News',array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
   <table class="none">
    <tr>
      <td>Título:</td>
      <td><?php echo $this->Form->input('title'); ?></td>
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
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nova Notícia', true), array('action' => 'admin_add')); ?></li>
	</ul>
</div>
<p>Total de  <?php echo $count; ?> notícias encontradas </p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id','ID');?></th>
	<th><?php echo $this->Paginator->sort('title','Título');?></th>
	<th><?php echo $this->Paginator->sort('date_published','Data');?></th>
	<th class="actions"><?php __('Ações');?></th>
</tr>
<?php
$i = 0;
foreach ($news as $new):

?>
	<tr>
		<td><?php echo $new['News']['id']; ?></td>
		<td style='width: 50%'><?php echo $new['News']['title']; ?></td>
		<td><?php echo $new['News']['date_published']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'admin_view', $new['News']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'admin_edit', $new['News']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'admin_delete', $new['News']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $new['News']['id'])); ?>
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
