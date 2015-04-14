<!-- File: /app/View/Vehicles/venda_seru_veiculo.ctp -->
<?php
$script = $this->Html->script(array('jquery.maskedinput','mascara_campo','jquery.numeric'))."\n";
  echo $this->addScript('scripts_for_layout',$script);
?>
<h1>Venda seu veículo</h1>
<p>Na Fr Veículos você vende seu seminovo da forma mais segura e nas melhores condições
comerciais. Alem disso, conta com nossa tradição e profissionalismo na prestação de serviços em
negócios automotivos.</p>
<p>Aqui você contará com a qualidade de nossa estrutura, atendimento e suporte digital.</p><br />
<div class="agendar">
<h2>Contato direto</h2>
<?php
  echo $this->Form->create('Venda',array('url' =>  '/venda-seu-veiculo-formulario-enviado'));
  echo "<div class='form_col'>";
  echo $this->Form->input('name',array(
    'label'=>'Nome*:',
    'type'=>'text',
    'maxlength'=>50,
    ));
  echo $this->Form->input('email',array('label'=>'E-mail*:','maxlength'=>50));
  echo $this->Form->input('telephone',array('label'=>'Telefone:','class'=>'telefone'));
  echo $this->Form->input('uf',array('label'=>'Estado:','type'=>'select','options'=>$estados));
  echo $this->Form->input('city',array('label'=>'Cidade:','type'=>'text','class'=>'custom','size'=>30));
  echo "</div>";
  echo "<div class='form_col'>";
  echo $this->Form->input('type_id',array('label'=>'Tipo*:','options'=>$types_list));
  echo $this->Form->input('brand',array('label'=>'Marca*:'));
  echo $this->Form->input('modelo',array('label'=>'Modelo*:'));
  echo $this->Form->input('manufacturing_year',array('label'=>'Ano fabricação:','type'=>'text','size'=>'4','maxlength'=>'4','class'=>'custom onlyNumbers'));
  echo $this->Form->input('model_year',array('label'=>'Ano modelo:','type'=>'text','size'=>'4','maxlength'=>'4','class'=>'custom onlyNumbers'));
  echo $this->Form->input('aditional_informations',array('label'=>'Informações Adicionais:','type'=>'textarea'));
  echo $this->Form->submit('btn_send.jpg');
  echo "</div>";

  echo $this->Form->end();

?>
</div>