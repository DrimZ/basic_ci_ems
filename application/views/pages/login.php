<div class="container-fluid d-table">
	<div class="d-table-column">
		<div class="card p-4 mt-5" style="width: 360px;">
			<h4 class="text-center text-uppercase mb-4" style="letter-spacing: 2px;">Login</h4>
			<?php echo form_open('login/auth'); ?>
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
				<?php
					echo form_submit('btn-login', 'Login', 'class="btn btn-primary float-right clearfix"');
					echo form_close();
				?>
				<p class="login-from-error">
					<?php
						echo validation_errors();
						if (isset($error_msg)) echo $error_msg;
					?>
				</p>
		</div>
	</div>
</div>
