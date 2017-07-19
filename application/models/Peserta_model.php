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

	public function get_id($key, $val) {
		$this->db->select('peserta_id');
		$this->db->where($key, $val);
		$query = $this->db->get($this->table, 1);
		return $query->result_array()[0]['peserta_id'];
	}

	public function get_header_info($key, $val) {
		$this->db->select('fullname, profpic_path, kota, provinsi, gender');
		$this->db->where($key, $val);
		$query = $this->db->get($this->table, 1);
		return $query->result_array()[0];
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
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function update_peserta($idpeserta, $data) {
		$this->db->set($data);
		$this->db->where('peserta_id', $idpeserta);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function update_profpic($idpeserta, $path) {
		$this->db->set('profpic_path', $path);
		$this->db->where('peserta_id', $idpeserta);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function completed_data($idpeserta) {
		$this->db->set('is_completed', 1);
		$this->db->where('peserta_id', $idpeserta);
		$this->db->update($this->table);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;	
	}

	public function is_ready($idpeserta) {
		$this->db->select('is_ready');
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array()[0];
		return $result['is_ready'];
	}

	public function is_video_exist($idpeserta) {
		$this->db->select('is_video_exist');
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array()[0];
		return $result['is_video_exist'];
	}

	public function is_completed($idpeserta) {
		$this->db->select('is_completed');
		$this->db->where('peserta_id', $idpeserta);
		$result = $this->db->get($this->table)->result_array();
		return $result[0]['is_completed'];
	}

}

?>