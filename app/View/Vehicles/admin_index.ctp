<!-- File: /app/View/Vehicles/admin_index.ctp -->
<?php
$script = $this->Html->script(array('jquery.selects','jquery.numeric','jquery.price_format.1.3',
  'jquery.maskedinput','mascara_campo','get_modelos'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<div class="vehicles index">
<h2><?php echo __('Veículos');?></h2>
<div class="filtro">
  <?php echo $this->Form->create('Vehicle',array('inputDefaults' => array(
                                                        'label' => false,
                                                        'div' => false))); ?>
   <table class="none" border="1">
    <tr>
      <td>Marca:</td>
      <td><?php echo $this->Form->input('brand_id',array('type'=>'select','options'=>$brands)); ?></td>
      <td>Modelo:</td>
      <td><?php echo $this->Form->input('modelo_id',array('empty'=>'Selecione a marca...','id'=>'VehicleModeloId')); ?></td>
      <td>Ano:</td>
      <td><?php echo $this->Form->input('year',array('class'=>'custom onlyNumbers')); ?></td>
    </tr>



    <tr>
     <td>Valor:</td>
    <td colspan="4">
       de: <?php echo $this->Form->input('value_from',array('class'=>'custom valor','size'=>'10')); ?>
       até: <?php echo $this->Form->input('value_to',array('class'=>'custom valor','size'=>'10')); ?>
    </td>
    <td>Ativo:</td>
    <td><?php echo $this->Form->input('status',array('type'=>'select','options'=>$status)); ?></td>
    <td>Exibir:</td>
      <td colspan="4">
        <?php echo $this->Form->input('qtde',array('type'=>'select','options'=>$qtde,'default'=>1)); ?>

      </td>
   </tr>
   <tr><td colspan="4"><?php echo $this->Form->submit('Pesquisar',array('div'=>false)); ?>  </td></tr>
  </table>
  </form>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Novo Veículo', true), array('action' => 'admin_add')); ?></li>
	</ul>
</div>
<p>Total de  <?php echo $count; ?> veículos encontrados </p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id','ID');?></th>
	<th><?php echo $this->Paginator->sort('Vehicle.name','Modelo');?></th>
	<th><?php echo $this->Paginator->sort('Brand.name','Marca');?></th>
  <th><?php echo $this->Paginator->sort('Vehicle.model_year','Ano');?></th>
  <th><?php echo $this->Paginator->sort('Vehicle.plate','Placa');?></th>
  <th><?php echo $this->Paginator->sort('Vehicle.price','Valor');?></th>
  <th>Ativo</th>
	<th class="actions"><?php echo ('Ações');?></th>
</tr>
<?php
$i = 0;
foreach ($vehicles as $vehicle):

?>
	<tr>
		<td><?php echo $vehicle['Vehicle']['id']; ?></td>
		<td><?php echo $vehicle['Vehicle']['name']; ?></td>
		<td><?php echo $vehicle['Brand']['name']; ?></td>
    <td><?php echo $vehicle['Vehicle']['model_year']; ?></td>
    <td><?php echo $vehicle['Vehicle']['plate']; ?></td>  
    <td><?php echo number_format($vehicle['Vehicle']['price'],2,",","."); ?></td>
		<td><?php echo $this->Status->showCurrentStatus('Vehicles','status',$vehicle['Vehicle']['status'],$vehicle['Vehicle']['id']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'admin_view', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'admin_edit', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'admin_delete', $vehicle['Vehicle']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $vehicle['Vehicle']['id'])); ?>
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
