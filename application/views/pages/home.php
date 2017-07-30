<div class="d-flex w-100 h-100">
	<div class="ems-side-bar h-100">
		<div class="ems-app-logo p-4">
			<span class="d-block pb-2 text-center">EMS</span>
		</div>
		<p class="text-center">Howdy, <?php echo $user; ?>&nbsp;<i class="fa fa-user-circle" aria-hidden="true"></i></p>
		<div class="list-group pt-2">
			<a class="list-group-item <?php if ($page === 'employees') echo 'active'; ?>" href="<?php echo base_url(); ?>">
				<i class="fa fa-users <?php if ($page === 'users') echo 'active'; ?>" aria-hidden="true"></i>&nbsp;Employees
			</a>
			<a class="list-group-item" href="<?php echo base_url() .'index.php/home/users'; ?>">
				<i class="fa fa-user" aria-hidden="true"></i>&nbsp;Users
			</a>
		</div>
		<a class="btn btn-default btn-logout" href="<?php echo base_url() .'index.php/home/log_out'; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Log out</a>
	</div>

	<div class="ems-container p-4 w-100">
