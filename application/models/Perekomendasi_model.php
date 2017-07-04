<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perekomendasi_model extends CI_Model {
	
	public $table = 'perekomendasi';

	public function read_perekomendasi($idpeserta) {
		$this->db->where(array('peserta_id' => $idpeserta, 'is_deleted' => 0));
		$query = $this->db->get($this->table);
		return $query;
	}

	public function insert_perekomendasi($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_perekomendasi($idpeserta, $data) {
		$this->db->where('peserta_id', $idpeserta);
		$this->db->set($data);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

}

?>