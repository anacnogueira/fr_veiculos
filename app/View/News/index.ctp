<!-- File: /app/View/News/index.ctp -->
<h1>Notícias</h1>
<?php
  if(isset($news) and !empty($news)){
     echo "<div class='sections'>";
     foreach($news as $new){
      echo "<div>";
      $slug_name = Inflector::slug($new['News']['title'],'-');
      $url =  '/noticia/'.$new['News']['id'].'/'.$slug_name;
      if(!empty($new['News']['image'])){
        $directory = 'news';
        echo $this->Html->image($directory . '/' .$new['News']['image'],array(
          'class'=>'thumb',
          'alt' => $new['News']['title'],
          'title' => $new['News']['title'],
          'url' => $url
        ));
      }
      echo "<h4>".$this->Html->link($new['News']['title'],$url) . '</h4>';
      echo "<p>".strip_tags($this->Text->excerpt($new['News']['content'],null, 60,'...')) . "</p>";
    echo "</div>";
  }
    echo "</div>";

     echo $this->Element('paging');
  }

?>