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

	public function read_pencapaian($idpeserta, $pencapaian_id) {
		$this->db->select('pencapaian_id, indeks, nama_pencapaian, waktu_durasi, penyelenggara, cakupan, peran, narahubung, alasan, platform, nama_akun, genre, portofolio');
		$this->db->where(array('peserta_id' => $idpeserta, 'pencapaian_id' => $pencapaian_id, 'is_deleted' => 0));
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function insert_pencapaian($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_pencapaian($idpeserta, $pencapaian_id, $data) {
		$this->db->where('peserta_id', $idpeserta);
		$this->db->where('pencapaian_id', $pencapaian_id);
		$this->db->set($data);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function is_ready($idpeserta) {
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array();
		if(sizeof($result) > 0){
			return 1;
		} else {
			return 0;
		}
	}

}

?>