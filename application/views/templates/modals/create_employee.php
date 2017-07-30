<div class="modal fade" id="emp-modal" tabindex="-1" role="dialog" aria-labelledby="Employee Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emp-modal-title">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="error-msg" id="emp-error"></div>
		<?php echo form_open('', 'id="emp-form"'); ?>
			<div class="form-group">
				<?php
					echo form_label('Full Name', 'name');
					echo form_input('name', '', 'class="form-control" placeholder="Full Name" required');
				?>
			</div>

			<div class="form-group">
				<?php echo form_label('Birth Date', 'b_date'); ?>
				<input class="form-control" type="date" name="b_date" placeholder="Birth Date" required>
			</div>

			<div class="form-group">
				<?php
					echo form_label('Address', 'address');
					echo form_input('address', '', 'class="form-control" placeholder="Address" required');
				?>
			</div>

			<div class="form-group">
				<?php
					echo form_label('Gender', 'gender', 'class="mr-3"');
					echo form_dropdown('gender', array('M' => 'Male', 'F' => 'Female'), 'M', 'class="custom-select" placeholder="Address" required');
				?>
			</div>

			<div class="form-group">
				<?php echo form_label('Salary', 'salary'); ?>
				<div class="input-group">				
					<div class="input-group-addon">PHP</div>
					<input class="form-control" name='salary' type="number" placeholder="Salary" required>
				</div>
			</div>
		<?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-emp-confirm">Add</button>
      </div>
    </div>
  </div>
</div>
