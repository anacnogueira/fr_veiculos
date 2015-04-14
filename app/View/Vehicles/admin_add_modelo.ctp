<!-- File: /app/View/Vehicles/admin_add_modelo.ctp -->
<?php
$script = $this->Html->script(array('vehicles','jquery.fancybox'));
 echo $this->addScript('scripts_for_layout',$script);


?>
<script>
$(document).ready(function(){
  var brand = parent.$('#VehicleBrandId').val();

  $('select#ModeloBrandId').find('option').each(function() {
     if($(this).val() == brand){
        $(this).attr('selected', true);
    }

  });
});
</script>

<h2>Modelos &raquo; Cadastrar</h2>
<div class="modelos form">
<?php echo $this->Form->create('Modelo');?>
<p>Os campos com * são obrigatórios</p>
  <?php echo $this->Form->input('brand_id',array('label'=>'Marca:'))."\n"; ?>
 <?php echo $this->Form->input('name',array('label'=>'Modelo:','maxlength'=>'50'))."\n"; ?>

<?php echo $this->Form->end('Enviar');?>
</div>