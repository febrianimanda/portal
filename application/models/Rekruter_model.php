<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekruter_model extends CI_Model {
	
	public $table = 'rekruter';

	public function read_all_rekruter() {
		$this->db->select('rekruter_id, email, domisili, koor_id');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_rekruter($id) {
		$this->db->select('rekruter_id, email, domisili, koor_id');
		$this->db->where('rekruter_id', $id);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_rekruter($rekruter_id, $data) {
		$this->db->set($data);
		$this->db->where('rekruter_id', $rekruter_id);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function insert_rekruter($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function upgrade_as_koordinator($rekruter_id) {
		$data = array(
			'koor_id' 		=> 0,
			'is_koor'			=> 1
		);
		$this->db->set($data);
		$this->db->where('rekruter_id', $rekruter_id);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

}

?>