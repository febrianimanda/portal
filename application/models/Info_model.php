<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {
	
	public $table = 'info_fim';

	public function read_all_info() {
		$this->db->select('info_id, keterangan, jumlah');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_info($id) {
		$this->db->where('info_id', $id);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_jumlah($key, $value) {
		$this->db->where($key, $value);
		$this->db->set('jumlah','`jumlah`+1', FALSE);
		$this->db->update($this->table);
		return $this->db->affected_rows();
	}

}

?>