<div class="bs-wrapper">
	<h1>Manage Inventories</h1>
	<a href="<?php echo admin_url('admin.php?page=new-inventory'); ?>" class="btn btn-success">New Inventory</a>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Available</th>
					<th>In Use</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($inventories as $key => $value): ?>
					<tr>
						<td><?php echo $value->name; ?></td>
						<td><?php echo $value->value; ?></td>
						<td>0</td>
						<td>
							<a class="btn btn-sm btn-primary" href="<?php echo admin_url('admin.php?page=edit-inventory&id=' . $value->id); ?>">Edit</a>
							<div class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $value->id; ?>)">Delete</div>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function confirmDelete(id)
	{
		if(confirm('Are you sure want to delete this record?'))
		{
			var path = '<?php echo admin_url('admin.php?page=manage-inventories'); ?>';
			var data = {
				_method : 'DELETE',
				id: id
			};

			jQuery.post(path, data, function(data, textStatus, xhr) {
				/*optional stuff to do after success */
			});
		}
	}
</script>
