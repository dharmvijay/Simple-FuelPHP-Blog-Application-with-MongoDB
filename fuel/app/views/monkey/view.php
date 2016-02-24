<h2>Viewing <span class='muted'>#<?php echo $monkey->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $monkey->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $monkey->content; ?></p>

<?php echo Html::anchor('monkey/edit/'.$monkey->id, 'Edit'); ?> |
<?php echo Html::anchor('monkey', 'Back'); ?>