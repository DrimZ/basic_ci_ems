<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="User Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="error-msg" id="user-error"></div>
		<?php echo form_open('', 'id="user-form"'); ?>
			<div class="form-group">
				<?php
					echo form_label('Username', 'username');
					echo form_input('username', '', 'class="form-control" placeholder="Username" required');
				?>
			</div>
			<div class="form-group">
				<?php
					echo form_label('Password', 'password');
					echo form_password('password', '', 'class="form-control" placeholder="Password" required');
				?>
			</div>
		<?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-user-confirm">Add</button>
      </div>
    </div>
  </div>
</div>
