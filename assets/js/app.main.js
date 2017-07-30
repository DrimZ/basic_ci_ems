(function($) {
	let selected = {};
     
 	$(document).ready(function() {
		$('#btn-user-confirm').on('click', function () { addUser(); });

		$('#btn-emp-confirm').on('click', function () {
			if (selected.action === 'add') addEmployee();
			if (selected.action === 'update') updateEmployee();
		});

		$('.emp-table').on('click', '.btn-delete', function (e) {
			$('#confirm-model-msg').text('Are you sure you want to remove this employee?');
			$('#confirm-modal').modal('show');
			selected.id = $(this).attr('data-eid');
			selected.type = 'employee';
		});

		$('.user-table').on('click', '.btn-delete', function (e) {
			$('#confirm-model-msg').text('Are you sure you want to remove this user?');
			$('#confirm-modal').modal('show');
			selected.id = $(this).attr('data-eid');
			selected.type = 'user';
		});

		$('.emp-table').on('click', '.btn-update', function (e) {
			selected.id = $(this).attr('data-eid');
			selected.type = 'employee';
			selected.action = 'update';
			loadEmployee();
		});

		$('button[data-target="#emp-modal"').on('click', function () {
			selected.action = 'add';
			$('#emp-form')[0].reset();
			$('#emp-modal-title').text('Add Employee');
			$('#btn-emp-confirm').text('Create');
		});

		$('#btn-confirm').on('click', function () {
			if (selected.id) deleteData();
		});
  	});

	function addEmployee () {
		let form = $('#emp-form');

		$('#emp-error').text('');
		if (form[0].checkValidity()) {
			$.ajax({
				type: 'post',
				url: `${base_url}index.php/home/create`,
				data: form.serialize(),
				success: function (response) {
					if (response) {
						if (response === 'success') {
							form[0].reset();
							$('#emp-modal').modal('hide');
							location.reload();
						} else $('#emp-error').html(response);
					} else $('#emp-error').text('Opps. Something went wrong please try again.');
				},
				error: function (err) {
					console.log('ERROR:: ' + err.responseText);
					$('#emp-error').text('Invalid Data. Please try again');
				}
			});
		} else form[0].reportValidity();
	}

	function addUser () {
		let form = $('#user-form');

		$('#user-error').text('');
		if (form[0].checkValidity()) {
			$.ajax({
				type: 'post',
				url: `${base_url}index.php/home/register`,
				data: form.serialize(),
				success: function (response) {
					if (response) {
						if (response === 'success') {
							form[0].reset();
							$('#user-modal').modal('hide');
							location.reload();
						} else $('#user-error').html(response);
					} else $('#user-error').text('Opps. Something went wrong please try again.');
				},
				error: function (err) {
					console.log('ERROR:: ' + err.responseText);
					$('#user-error').text('Invalid Data. Please try again');
				}
			});
		} else form[0].reportValidity();
	}

	function loadEmployee () {
		if (selected.id > -1) {
			$.ajax({
				type: 'post',
				url: `${base_url}index.php/home/load`,
				data: `id=${selected.id}&type=employee`,
				success: function (response) {
					if (response !== 'not_found') {
						let _data = JSON.parse(response);
						delete _data.id;
						selected.data = _data;
						$('#emp-modal-title').text('Update Employee');
						$('#btn-emp-confirm').text('Update');
						$('#emp-form input[name="name"]').val(_data.name);
						$('#emp-form input[name="b_date"]').val(_data.b_date);
						$('#emp-form input[name="address"]').val(_data.address);
						$('#emp-form select[name="gender"]').val(_data.gender);
						$('#emp-form input[name="salary"]').val(_data.salary);
						$('#emp-modal').modal('show');
					}
				},
				error: function (err) {
					console.log('ERROR:: ' + err.responseText);
				}
			});
		}
	}

	function updateEmployee () {
		let form = $('#emp-form');

		if (form[0].checkValidity()) {
			if (selected.id > -1) {
				$.ajax({
					type: 'post',
					url: `${base_url}index.php/home/update`,
					data: `id=${selected.id}&type=${selected.type}&${form.serialize()}`,
					success: function (response) {
						if (response) {
							form[0].reset();
							$('#emp-modal').modal('hide');
							location.reload();
						}
						console.log(response);
					},
					error: function (err) {
						console.log('ERROR:: ' + err.responseText);
					}
				});
			}
		} else form[0].reportValidity();
	}

	function deleteData () {
		if (selected.id > -1) {
			$.ajax({
				type: 'post',
				url: `${base_url}index.php/home/delete`,
				data: `id=${selected.id}&type=${selected.type}`,
				success: function (response) {
					if (response) {
						$('#confirm-model-msg').text('');
						$('#confirm-modal').modal('hide');
						location.reload();
					}
				},
				error: function (err) {
					console.log('ERROR:: ' + err.responseText);
				}
			});
		}
	}
})(jQuery);
