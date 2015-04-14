<div class="menu">
 <ul>
  <?php foreach($menu_admin as $item): ?>
    <li><?php echo $this->Html->link($item['MenuAdmin']['nome'],$item['MenuAdmin']['link']); ?></li>
  <?php endforeach; ?>
 </ul>
</div>
