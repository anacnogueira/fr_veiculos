<div class="search">
  <?php
    echo "<fieldset>";
    echo "<legend>Busque seu veículo</legend>";
    echo $this->Form->create("Vehicle",array(
      'div'=>false,
      'url' =>  '/resultado-busca'));
    echo $this->Form->input("type_id",array(
      "label"=>"Tipo",
      "type"=>"select",
      "options"=>$types_list
    ));
    echo $this->Form->input("brand_id",array(
      "label"=>"Marca",

      "type"=>"select",
      "options"=>$brands_list,
      "id"=>"VehicleBrandId"
    ));
    echo $this->Form->input("modelo_id",array(
      "label"=>"Modelo",
      "type"=>"select",
      "disabled"=>"disabled",
      'empty'=>'Selecione a marca...',
      'id'=>'VehicleModeloId'
      ));
    echo $this->Form->input("year",array("label"=>"Ano","type"=>"select",'options'=>$years));
    echo $this->Form->input("price",array("label"=>"Preço","type"=>"select",'options'=>$valores));
    echo "<div>";
    echo $this->Form->radio('category_id',array(

   '1'=>'Novo',
   '2'=>'Seminovo'),array('legend'=>false,'label'=>false));

    echo $this->Form->submit('btn_buscar.jpg',array('div'=>false));
    echo "</div>";
    echo $this->Form->End();
    echo "</fieldset>";
  ?>
</div>
