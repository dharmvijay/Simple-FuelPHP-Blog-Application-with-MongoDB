<h2>Viewing <span class='muted'>#<?php echo $blog['_id']; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $blog['title']; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $blog['content']; ?></p>

<?php echo Html::anchor('blog/edit/'.$blog['_id'], 'Edit'); ?> |
<?php echo Html::anchor('blog', 'Back'); ?>