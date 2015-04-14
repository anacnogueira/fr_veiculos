<!-- File: /app/View/Vehicles/sent.ctp -->
<h1><?php echo $vehicle['Brand']['name'] . ' ' . $vehicle['Vehicle']['name']; ?></h1>
<h2>
  <?php echo $vehicle['Vehicle'] ['manufacturing_year'].'/'. $vehicle['Vehicle'] ['model_year']; ?>
  - <?php echo $vehicle['Category']['name']; ?> 
</h2>
<?php if(!empty($vehicle['VehiclePhoto'])): ?>

<?php endif; ?>
<h4>Formulario enviado com sucesso!</h4>
<p>Seu formulário foi enviado, em breve entraremos em contato.</p>
<p><b>Fr Veículos</b></p>
<?php echo $this->Html->link('Voltar',"/".$url); ?>
