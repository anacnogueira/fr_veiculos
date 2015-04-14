<?php
  class StatusHelper extends AppHelper{
    var $helpers = array('Html');

    function showCurrentStatus($table,$field,$status,$id){
      if(!empty($table) and !empty($field) and !empty($status) and !empty($id)){
        if($status == 'S'){
          $out = $this->Html->image('icon_status_green.gif');
          $out .= '&nbsp;<a href="status/change/table:'.$table.'/field:'.$field.'/status:N/id:'.$id.'">'.
                  $this->Html->image('icon_status_red_light.gif',array('alt'=>'Desativar')).'<a/>';
        } else if($status == 'N'){
          $out = '<a href="status/change/table:'.$table.'/field:'.$field.'/status:S/id:'.$id.'">'.
                  $this->Html->image('icon_status_green_light.gif',array('alt'=>'Ativar')).'<a/>';
          $out .= "&nbsp;".$this->Html->image('icon_status_red.gif');
        }
      }
      else{
       trigger_error(sprintf('Nenhuma tabela encontrada',get_class($this)),E_USER_NOTICE);
      }


       return $this->output($out);
    }

    function changeStatus($table,$field,$status,$id){
     if(!empty($table) and !empty($field) and !empty($status) and !empty($id)){
      $this->query("UPDATE $table SET $field='$status' WHERE id='$id'");
      $this->redirect($this->referer());
     }
    }
  }
?>
