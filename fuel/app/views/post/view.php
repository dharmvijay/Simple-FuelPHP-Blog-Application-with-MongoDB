<h2>Viewing <span class='muted'>#<?php echo $post->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $post->content; ?></p>

<?php echo Html::anchor('post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('post', 'Back'); ?>