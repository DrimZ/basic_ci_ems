<div class="ems-container-header mb-5">
	<span class="text-uppercase">Users</span>
	<button type="button" class="float-right clearfix" data-toggle="modal" data-target="#user-modal">
		<i class="fa fa-plus-circle"></i>&nbsp;Add User
	</button>
</div>


<div class="card">
	<div class="ems-table">
		<table class="table table-striped user-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $user_cnt = $start_cnt + 1; ?>
				<?php foreach ($data as $user): ?>
					<tr>
						<th scope="row" width="40"><?php echo $user_cnt; ?></th>
						<td><?php echo $user->username; ?></td>
						<td nowrap width="30">
							<button class="btn btn-danger btn-sm btn-delete" type="button" data-eid="<?php echo $user->id; ?>">
								<i class="fa fa-trash-o"></i>
							</button>
						</td>
					</tr>
					<?php $user_cnt++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="ems-pagination text-center px-4 pt-2 pb-3">
		<?php echo $pagination; ?>		
	</div>
</div>

<!-- Confirm Modal -->
<?php include_once('modals/modal_confirm.php'); ?>

<!-- Create Modal -->
<?php include_once('modals/create_user.php'); ?>
