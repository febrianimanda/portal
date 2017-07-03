<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
	
	public $table = 'project';

	public function read_project($idpeserta) {
		$this->db->where(array('id_peserta' => $idpeserta, 'is_deleted' => 0));
		$query = $this->db->get($this->table);
		return $query;
	}

	public function insert_project($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_project($data) {
		$this->db->set($data);
		$this->db->update($this->table);
	}

}

?>