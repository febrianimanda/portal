<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
	
	public $table = 'project';

	public function read_project($idpeserta) {
		$this->db->where(array('peserta_id' => $idpeserta, 'is_deleted' => 0));
		$query = $this->db->get($this->table);
		return $query;
	}

	public function insert_project($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function update_project($idpeserta, $data) {
		$this->db->where('peserta_id', $idpeserta);
		$this->db->set($data);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function is_ready($idpeserta) {
		$this->db->select('is_ready');
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array();
		if(sizeof($result) > 0){
			return $result[0]['is_ready'];
		} else {
			return 0;
		}
	}

}

?>