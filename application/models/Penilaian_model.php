<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {
	
	public $table = 'penilaian';

	public function read_all_submitted_documents() {
		$this->db->where(array('is_completed' => 1, 'is_deleted' => 0));
		$query = $this->db->get('peserta');
		return $query;
	}

	public function create_penugasan($rekruter_id, $peserta_id) {
		$data = array(
			'peserta_id' 	=> $peserta_id,
			'rekruter_id' => $rekruter_id
		);
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function ubah_penugasan($peserta_id, $rekruter_id, $new_rekruter_id) {
		$this->db->where('peserta_id', $peserta_id);
		$this->db->where('rekruter_id', $rekruter_id);
		$this->db->set(array('rekruter_id' => $new_rekruter_id));
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function update_nilai($peserta_id, $rekruter_id, $data) {
		$this->db->where('peserta_id', $peserta_id);
		$this->db->where('rekruter_id', $rekruter_id);
		$this->db->set($data);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}
}

?>