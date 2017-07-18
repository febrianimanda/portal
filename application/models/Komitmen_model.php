<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komitmen_model extends CI_Model {
	
	public $table = 'komitmen';

	public function read_komitmen($idpeserta) {
		$this->db->where(array('peserta_id' => $idpeserta, 'is_deleted' => 0));
		$query = $this->db->get($this->table);
		return $query;
	}

	public function insert_komitmen($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function is_ready($idpeserta) {
		$this->db->select('is_ready');
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array()[0];
		return $result['is_ready'];
	}

}

?>