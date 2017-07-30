<?php
	class User extends CI_Model {

		public function __construct () {
			parent::__construct();
			$this->load->library('encrypt');
		}

		public function authenticate () {
			$sql = $this->db->get_where('users', array('username' => $this->db->escape_str($this->input->post('username'))), 1);
			$row = $sql->row();
			if (!isset($row)) return 'Username not found.';
			$pass = $this->encrypt->decode($row->password);
			return $pass === $this->input->post('password') ? 'authenticated' : 'Your password is incorrect.';
		}

		public function load_all ($limit = NULL, $offset = NULL) {
			$sql = $this->db->where(array('username !=' => 'admin'))->get('users', $limit, $offset);
			return $sql->result();
		}

		public function register ($user) {
			$user['username'] = $this->db->escape_str($user['username']);
			$user['password'] = $this->encrypt->encode($this->db->escape_str($user['password']));

			$this->db->insert('users', $user);
			return $this->db->affected_rows() > 0 ? 'success' : 'error';
		}

		public function update () {
			$user['username'] = $this->db->escape_str($this->input->post('username'));
			$user['password'] = $this->encrypt->encode($this->db->escape_str($this->input->post('password')));

			$this->db->where('username', $user['username'])->update('users', $user);
			return $this->db->affected_rows() > 0;
		}

		public function remove ($id) {
			$this->db->delete('users', array('id' => $this->db->escape_str($id)));
			return $this->db->affected_rows() > 0;
		}

		public function total () {
			return $this->db->count_all('users');
		}
	}
?>
