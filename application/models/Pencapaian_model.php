<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencapaian_model extends CI_Model {
	
	public $table = 'pencapaian';

	public function read_all_pencapaian($idpeserta) {
		$this->db->where(array('id_peserta' => $idpeserta, 'is_deleted' => 0));
		$this->db->order_by('indeks', "asc");
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_pencapaian($idpeserta, $index) {
		$this->db->where(array('id_peserta' => $idpeserta, 'indeks' => $index, 'is_deleted' => 0));
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function insert_pencapaian($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_pencapaian($data) {
		$this->db->set($data);
		$this->db->update($this->table);
	}

}

?>