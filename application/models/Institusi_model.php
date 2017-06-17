<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institusi_model extends CI_Model {
	
	public $table = 'institusi';

	public function read_all_institusi() {
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_institusi($id) {
		$this->db->where('institusi_id', $id);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($id) {
		$this->db->where('institusi_id', $id);
		$this->db->set('jumlah','`jumlah`+1', FALSE);
		$query = $this->db->update($this->table);
	}

}

?>