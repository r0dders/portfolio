<?php foreach ($content as $content_item): ?>

	<h2><?php echo $content_item['content_title'] ?></h2>
	<div id="main">
		<?php echo $content_item['content_text'] ?>
	</div>
	<p><a href="content/<?php echo $content_item['content_id'] ?>">View article</a></p>
	
<?php endforeach ?>