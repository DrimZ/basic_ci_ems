<div class="ems-container-header mb-5">
	<span class="text-uppercase">Employees</span>
	<button type="button" class="float-right clearfix" data-toggle="modal" data-target="#emp-modal">
		<i class="fa fa-plus-circle"></i>&nbsp;Add Employee
	</button>
</div>


<div class="card">
	<div class="ems-table">
		<table class="table table-striped emp-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Full Name</th>
					<th>Birth Date</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Salary</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $emp_cnt = $start_cnt + 1; ?>
				<?php foreach ($data as $employee): ?>
					<tr>
						<th scope="row"><?php echo $emp_cnt; ?></th>
						<td><?php echo $employee->name; ?></td>
						<td><?php echo mdate('%F %j, %Y', strtotime($employee->b_date)); ?></td>
						<td><?php echo $employee->address; ?></td>
						<td><?php echo $employee->gender; ?></td>
						<td><?php echo money_format('%i', $employee->salary); ?></td>
						<td nowrap>
							<button class="btn btn-primary btn-sm btn-update" type="button" data-eid="<?php echo $employee->id; ?>">
								<i class="fa fa-pencil-square-o"></i>
							</button>
							<button class="btn btn-danger btn-sm btn-delete" type="button" data-eid="<?php echo $employee->id; ?>">
								<i class="fa fa-trash-o"></i>
							</button>
						</td>
					</tr>
					<?php $emp_cnt++; ?>
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
<?php include_once('modals/create_employee.php'); ?>
