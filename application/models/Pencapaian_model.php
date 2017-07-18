<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencapaian_model extends CI_Model {
	
	public $table = 'pencapaian';

	public function read_all_pencapaian($idpeserta) {
		$this->db->where(array('peserta_id' => $idpeserta, 'is_deleted' => 0));
		$this->db->order_by('indeks', "asc");
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_pencapaian($idpeserta, $index) {
		$this->db->select('indeks, nama_pencapaian, waktu_durasi, penyelenggara, cakupan, peran, narahubung, alasan');
		$this->db->where(array('peserta_id' => $idpeserta, 'indeks' => $index, 'is_deleted' => 0));
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function insert_pencapaian($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_pencapaian($idpeserta, $indeks, $data) {
		$this->db->where('peserta_id', $idpeserta);
		$this->db->where('indeks', $indeks);
		$this->db->set($data);
		$this->db->update($this->table);
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