<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {

		public function __construct () {
			parent::__construct();
			// libraries
			$this->load->library('encrypt');

			// models
			$this->load->model('user');
		}

		public function index ($data = NULL) {
			if ($this->session->has_userdata('username')) {
				redirect('home/employees');
			}

			$data['title'] = 'Login';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		}

		public function auth () {
			$this->form_validation->set_rules('username', 'Username', 'min_length[4]|max_length[50]|required');
    		$this->form_validation->set_rules('password', 'Password', 'min_length[4]|max_length[255]|required');

			if ($this->form_validation->run()) {
				$result = $this->user->authenticate();
				if ($result === 'authenticated') {
					$this->session->set_userdata('username', $this->input->post('username'));
					redirect('home/employees');
				} else {
					$data['error_msg'] = $result;
					$this->index($data);
				}
			} else $this->index();
		}
		
	}
	
?>
