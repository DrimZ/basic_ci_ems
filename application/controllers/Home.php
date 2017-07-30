<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct () {
			parent::__construct();
			$this->load->helper('date');
			$this->load->model('employee');
			$this->load->model('user');
			$this->load->library('pagination');
		}

		public function log_out () {
			$this->session->unset_userdata('username');
			redirect('login');
		}

		public function employees ($start = 0) {
			$data['per_page']  = '5';
			$data['start_cnt'] = $start;
			$data['data']  = $this->employee->load_all($data['per_page'], $start);
			$data['total'] = $this->employee->total() + 1;
			$this->load_view('employees', $data);
		}

		public function users ($start = 0) {
			$data['per_page']  = '5';
			$data['start_cnt'] = $start;
			$data['data']  = $this->user->load_all($data['per_page'], $start);
			$data['total'] = $this->user->total();
			$this->load_view('users', $data);
		}

		private function load_view ($page, $data = []) {
			if (!$this->session->has_userdata('username')) {
				redirect('login');
			}

			$this->pagination->initialize(array(
				'base_url' => base_url() . 'index.php/home/' . $page,
				'total_rows' => $data['total'],
				'per_page' => $data['per_page']
			));

			$data['title'] = 'Employee Management System';
			$data['page']  = $page;
			$data['user']  = $this->session->userdata('username');
			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('templates/header', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('templates/'. $page, $data);
			$this->load->view('templates/footer');
		}

		public function load () {
			if ($this->input->post('type') === 'employee') {
				echo json_encode($this->employee->load($this->input->post('id')));
			} else if ($this->input->post('type') === 'user') {
				echo json_encode($this->user->load($this->input->post('id')));
			} else echo false;
		}

		public function create () {
			if ($this->validate_employee()) {
				$employee = array(
					'name'    => $this->input->post('name'),
					'b_date'  => $this->input->post('b_date'),
					'address' => $this->input->post('address'),
					'gender'  => $this->input->post('gender'),
					'salary'  => $this->input->post('salary'),
				);

				echo $this->employee->add($employee);
			} else echo validation_errors();
		}

		public function register () {
			$this->form_validation->set_rules('username', 'Username', 'min_length[4]|max_length[50]|required');
    		$this->form_validation->set_rules('password', 'Password', 'min_length[4]|max_length[255]|required');

			if ($this->form_validation->run()) {
				echo $this->user->register(array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				));
			} else echo validation_errors();
		}

		public function update () {
			if ($this->validate_employee()) {
				$employee = array(
					'name'    => $this->input->post('name'),
					'b_date'  => $this->input->post('b_date'),
					'address' => $this->input->post('address'),
					'gender'  => $this->input->post('gender'),
					'salary'  => $this->input->post('salary'),
				);

				echo $this->employee->update($employee);
			} else echo validation_errors();
		}

		public function delete () {
			if ($this->input->post('type') === 'employee') {
				echo $this->employee->delete($this->input->post('id'));
			} else if ($this->input->post('type') === 'user') {
				echo $this->user->remove($this->input->post('id'));
			} else echo false;
		}

		private function validate_employee () {
			$gen_rules = '|max_length[255]|required';
			
			$this->form_validation->set_rules('name', 'Full Name', 'min_length[4]'. $gen_rules);
			$this->form_validation->set_rules('b_date', 'Birth Date', 'min_length[8]'. $gen_rules);
			$this->form_validation->set_rules('address', 'Address', 'min_length[4]'. $gen_rules);
			$this->form_validation->set_rules('gender', 'Gender', 'min_length[1]'. $gen_rules);
			$this->form_validation->set_rules('salary', 'Salary', 'min_length[4]'. $gen_rules);

			return $this->form_validation->run();
		}
	}
	
?>
