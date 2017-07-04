<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {
	
	public $table = 'provinsi';

	public function read_all_provinsi() {
		$this->db->select('provinsi_id, key, nama_provinsi, jumlah');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_provinsi($key, $value) {
		$this->db->where($key, $value);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($key, $val, $inc=true) {
		$this->db->where($key, $val);
		if($inc == true) {
			$this->db->set('jumlah','`jumlah`+1', FALSE);
		} else {
			$this->db->set('jumlah','`jumlah`-1', FALSE);
		}
		$query = $this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

}

?>