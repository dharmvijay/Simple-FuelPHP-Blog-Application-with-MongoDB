<h2>Editing <span class='muted'>Post</span></h2>
<br>

<?php echo render('post/_form'); ?>
<p>
	<?php echo Html::anchor('post/view/'.$post->id, 'View'); ?> |
	<?php echo Html::anchor('post', 'Back'); ?></p>
