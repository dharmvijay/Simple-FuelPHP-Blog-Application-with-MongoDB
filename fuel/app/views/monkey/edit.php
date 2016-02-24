<h2>Editing <span class='muted'>Monkey</span></h2>
<br>

<?php echo render('monkey/_form'); ?>
<p>
	<?php echo Html::anchor('monkey/view/'.$monkey->id, 'View'); ?> |
	<?php echo Html::anchor('monkey', 'Back'); ?></p>
