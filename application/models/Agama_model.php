<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_model extends CI_Model {
	
	public $table = 'agama';

	public function read_all_agama() {
		$this->db->select('agama_id, agama, jumlah');
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_agama($id) {
		$this->db->where('agama_id', $id);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($id) {
		$this->db->where('agama_id', $id);
		$this->db->set('jumlah','`jumlah`+1', FALSE);
		$query = $this->db->update($this->table);
	}

}

?>