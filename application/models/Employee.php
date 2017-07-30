<?php
	class Employee extends CI_Model {

		public function __contruct () {
			$this->load->database();
		}

		public function load_all ($limit = NULL, $offset = NULL) {
			$query = $this->db->get('employees', $limit, $offset);
			return $query->result();
		}

		public function load ($id) {
			$query = $this->db->get_where('employees', array('id' => $this->db->escape_str($id)), 1);
			return $query->num_rows() > 0 ? $query->row() : 'not_found';
		}

		public function add ($employee) {
			$employee = $this->sanitize_data($employee);

			$this->db->insert('employees',$employee);
			return $this->db->affected_rows() > 0 ? 'success' : 'error';
		}

		public function delete ($id) {
			$this->db->delete('employees', array('id' => $this->db->escape_str($id)));
			return $this->db->affected_rows() > 0;
		}

		public function update ($employee) {
			$employee = $this->sanitize_data($employee);

			$this->db->where('id', $this->db->escape_str($this->input->post('id')))->update('employees', $employee);
			return json_encode($employee) .'---'. $this->db->affected_rows();
		}

		private function sanitize_data ($data) {
			foreach($data as $key => $value) {
				$data[$key] = $this->db->escape_str($value);
			}

			return $data;
		}

		public function total () {
			return $this->db->count_all('employees');
		}
	}
?>
