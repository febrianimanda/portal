<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $table = 'user';

	public function read_user($email) {
		$this->db->where('email', $mail);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_user($email, $data) {
		$this->db->set($data);
		$this->db->where('email', $email);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public $user_column = array('email', 'username', 'role', 'date_updated', 'user_id');
	public $user_column_order = array(null, 'email', 'username', 'role', 'date_updated', 'user_id');
	public $user_column_search = array('email', 'username');
	public $user_order = array('email' => 'asc');

	public function get_datatable_query() {
		$this->db->select($this->user_column);
		$this->db->from($this->table);
		$this->db->where('is_deleted', 0);

		$i = 0;
		foreach ($this->user_column_search as $item) {
			if($_POST['search']['value']) { //search condition
				if($i === 0) {
					$this->db->group_start(); // open bracket clause
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->user_column_search) - 1 == $i) {
					$this->db->group_end(); //close bracket clause
				}
			}
			$i++;
		}

		if(isset($_POST['order'])) {
			$this->db->order_by($this->user_column_order[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		} else if(isset($this->user_order)) {
			$order = $this->user_order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatable() {
		$this->get_datatable_query();
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function count_filtered() {
		$this->get_datatable_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

}

?>