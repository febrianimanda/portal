<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {
	
	public $table = 'provinsi';

	public function read_all_provinsi() {
		$this->db->select('provinsi_id, key, nama_provinsi, jumlah');
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_provinsi($key) {
		$this->db->where('key', $key);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($key) {
		$this->db->where('key', $key);
		$this->db->set('jumlah','`jumlah`+1', FALSE);
		$query = $this->db->update($this->table);
	}

}

?>