<!-- File: /app/View/News/admin_view.ctp -->
<div class="news view">
<h2><?php  echo __('Notícia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Título:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['title']; ?>
			&nbsp;
		</dd>
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Data:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['date_published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Conteúdo:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Imagem:'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->image('news/'.$news['News']['image'],
    array('alt'=>$news['News']['title'])); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Notícia', true), array('action' => 'admin_edit', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Excluir Notícia', true), array('action' => 'admin_delete', $news['News']['id']), null, sprintf('Tem certeza que deseja excluir o registro # %s?', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Notícias', true), array('action' => 'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Notícia', true), array('action' => 'admin_add')); ?> </li>
	</ul>
</div>
