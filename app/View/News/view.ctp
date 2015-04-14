<!-- File: /app/View/News/view.ctp -->  
<h1><?php echo $news['News']['title']; ?></h1>
<p class='date_published'><?php echo $news['News']['date_published']; ?></p>
<?php
  if(!empty($news['News']['image'])){
    $directory = "news/";
    echo $this->Html->image($directory . $news['News']['image'],array(
      'class'=>'news_image',
      'alt'=> $news['News']['title'],
      'title' => $news['News']['title'],
      'align'=>'left'
    ));
  }
?>
<?php echo $news['News']['content']; ?>