<h2>Listing <span class='muted'>Blogs</span></h2>
<br>
<?php if ($blogs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($blogs as $item): ?>		<tr>
			<td><?php echo $item['title']; ?></td>
			<td><?php echo $item['content']; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('blog/view/'.$item['_id'], '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						
                        <?php echo Html::anchor('blog/edit/'.$item['_id'], '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						
                        <?php echo Html::anchor('blog/delete/'.$item['_id'], '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Blogs.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('blog/create', 'Add new Blog', array('class' => 'btn btn-success')); ?>

</p>
