<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalur_model extends CI_Model {
	
	public $table = 'jalur';

	public function read_all_jalur() {
		$this->db->select('jalur_id, key, details, percentage, jumlah');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_jalur($key) {
		$this->db->where('key', $key);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($key, $inc=true) {
		$this->db->where('key', $key);
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