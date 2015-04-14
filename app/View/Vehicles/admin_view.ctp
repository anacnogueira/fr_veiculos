<!-- File: /app/View/Vehicles/admin_view.ctp -->
<?php
  $script  = $this->Html->script(array('jquery.mousewheel','jquery.fancybox','config.fancybox'))."\n";
  $script .= $this->Html->css(array('jquery.fancybox'));
   echo $this->addScript('scripts_for_layout',$script);
?>
<div class="vehicle view">
<h2><?php  echo __('Veículo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('ID:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nome:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['name']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Placa:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['plate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Tipo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Type']['name']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Categoria:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Category']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Marca:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Brand']['name']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modelo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Modelo']['name']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ano Fabricação:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['manufacturing_year']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ano Modelo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['model_year']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kilometragem:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['kilometrage']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Valor:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo number_format($vehicle['Vehicle']['price'],2,",","."); ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Observação:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['obs']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ativo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $vehicle['Vehicle']['status']=='S' ? 'Sim' : 'Não'; ?>
			&nbsp;
		</dd>
   <?php if(!empty($items)){ ?>
    <h3>Items</h3>
    <?php
      foreach($items as $name => $value){
        echo "<dt>".$name.": </dt>";
        echo "<dd>".$value."</dd>";
      }
   } ?> <br />
    <h3>Opcionais</h3>
     <?php
    //Opcionais 2
    if(!empty($options['Opcional2'])){
      echo "<div class='opt2'><ul>";
      foreach($options['Opcional2'] as $opt2){
        echo "<li>".$opt2."</li>";
      }
      echo "</ul></div>";
    }

  ?>

  <?php
    //Opcionais 1
    if(!empty($options['Opcional1'])){
      echo "<br /><div class='opt1'><ul>";
      foreach($options['Opcional1'] as $opt1){
        echo "<li>".$opt1."</li>";
      }
      echo "</ul></div>";
    }

  ?>

  <?php if(!empty($vehicle['VehiclePhoto'])): ?>
    <fieldset>
     <legend><?php __('Fotos');?></legend>
     <div class="box">
        <ul>
         <?php for($idx=0;$idx<sizeof($vehicle['VehiclePhoto']);$idx++): ?>
        <li>
         <?php echo $this->Html->link(
            $this->Html->image("vehicles"."/".$vehicle['VehiclePhoto'][$idx]['photo_redim'],array('alt'=>'')),
              "/img/vehicles/".$vehicle['VehiclePhoto'][$idx]['photo_ori'],array('class'=>'imagem iframe.fancybox'),
              array('escape'=>false));
          <?/*php
             echo $this->Html->image(
               "vehicles"."/".$vehicle['VehiclePhoto'][$idx]['photo_redim'],array(
                'url' => "/img/vehicles/" .$vehicle['VehiclePhoto'][$idx]['photo_ori'],
                'alt' => $vehicle['Vehicle']['name'],
                'title' => $vehicle['Vehicle']['name'],
                'class' => 'imagem iframe.fancybox'
               )
             );
             */
          ?>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
  </fieldset>
  <?php endif; ?>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Veículo', true), array('action' => 'admin_edit', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Veículo', true), array('action' => 'admin_delete', $vehicle['Vehicle']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Veículos', true), array('action' => 'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Veículo', true), array('action' => 'admin_add')); ?> </li>
	</ul>
</div>
