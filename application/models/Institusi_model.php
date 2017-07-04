<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institusi_model extends CI_Model {
	
	public $table = 'institusi';

	public function read_all_institusi() {
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_institusi($key, $val) {
		$this->db->where($key, $val);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function read_institusi_id($key, $val) {
		$this->db->where('nama_institusi', $institusi);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function is_exist($institusi) {
		$this->db->where('nama_institusi', $institusi);
		$this->db->get($this->table, 1);
		if($this->db->affected_rows() == 1) { return true; } 
		else { return false; }
	}

	public function insert_institusi($institusi, $jumlah=0) {
		$data = array(
			'nama_institusi' => $institusi,
			'jumlah' => $jumlah
		);
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}

	public function update_jumlah($key, $val, $inc=true) {
		$this->db->where($key, $val);
		if($inc == true) {
			$this->db->set('jumlah','`jumlah`+1', FALSE);
		} else {
			$this->db->set('jumlah','`jumlah`-1', FALSE);
		}
		$query = $this->db->update($this->table);
	}

}

?>