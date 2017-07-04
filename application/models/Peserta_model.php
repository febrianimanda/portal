<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {
	
	public $table = 'peserta';

	public function read_all_peserta($limit=0, $offset=0) {
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table, $limit, $offset);
		return $query;
	}

	public function read_peserta_by_email($email) {
		$this->db->where('email', $email);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function read_peserta_by_username($username) {
		$this->db->where('username', $username);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function read_ext_data($username) {
		$this->db->select('username, agama, institusi, provinsi');
		$this->db->where('username', $username);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function insert_peserta($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? False : True;
	}

	public function update_peserta($data) {
		$this->db->set($data);
		$this->db->update($this->table);
	}

}

?>