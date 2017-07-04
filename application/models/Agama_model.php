<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_model extends CI_Model {
	
	public $table = 'agama';

	public function read_all_agama() {
		$this->db->select('agama_id, agama, jumlah');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_agama($id) {
		$this->db->where('agama_id', $id);
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