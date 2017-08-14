<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekruter_model extends CI_Model {
	
	public $table = 'rekruter';

	public function read_all_rekruter() {
		$this->db->select('rekruter_id, email, domisili, koor_id');
		$this->db->where('is_deleted',0);
		$query = $this->db->get($this->table);
		return $query;
	}

	public function read_rekruter($id) {
		$this->db->select('rekruter_id, email, domisili, koor_id');
		$this->db->where('rekruter_id', $id);
		$query = $this->db->get($this->table, 1);
		return $query;
	}

	public function update_rekruter($rekruter_id, $data) {
		$this->db->set($data);
		$this->db->where('rekruter_id', $rekruter_id);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function insert_rekruter($data) {
		$this->db->insert($this->table, $data);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public function upgrade_as_koordinator($rekruter_id) {
		$data = array(
			'koor_id' 		=> 0,
			'is_koor'			=> 1
		);
		$this->db->set($data);
		$this->db->where('rekruter_id', $rekruter_id);
		return ($this->db->affected_rows() != 1) ? $this->db->error() : True;
	}

	public $datatable_column = array('peserta.peserta_id as peserta_id', 'peserta.profpic_path as profpic_path', 'user.jalur as jalur', 'peserta.fullname as fullname', 'peserta.institusi as institusi', 'peserta.video_profile as video_profile', 'perekomendasi.file_rekomendasi_path as file_rekomendasi_path', 'penilaian.nilai_cv as nilai_cv', 'penilaian.nilai_esai as nilai_esai', 'penilaian.nilai_project as nilai_project', 'penilaian.nilai_kelengkapan as nilai_kelengkapan', 'penilaian.nilai_total as nilai_total');
	public $datatable_column_order = array(null, 'peserta_id', 'profpic_path', 'jalur', 'fullname', 'institusi', 'video_profile', ' ile_rekomendasi_path', 'nilai_cv', 'nilai_esai', 'nilai_project', 'nilai_kelengkapan', 'nilai_total');

	public $datatable_column_search = array('jalur', 'fullname', 'institusi');
	public $datatable_order = array('fullname' => 'asc');

	public function get_datatable_peserta_query() {
		$this->db->select($this->datatable_column);
		$this->db->from('peserta');
		$this->db->join('user', 'peserta.email = user.email', 'inner');
		$this->db->join('penilaian', 'peserta.peserta_id = penilaian.peserta_id', 'left');
		$this->db->join('perekomendasi', 'peserta.peserta_id = perekomendasi.peserta_id', 'left');
		$this->db->where(array('peserta.is_completed' => 1, 'peserta.is_deleted' => 0));
		$i = 0;

		foreach ($this->datatable_column_search as $item) {
			if($_POST['search']['value']) { //search condition
				if($i === 0) {
					$this->db->group_start(); // open bracket clause
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->datatable_column_search) - 1 == $i) {
					$this->db->group_end(); //close bracket clause
				}
			}
			$i++;
		}

		if(isset($_POST['order'])) {
			$this->db->order_by($this->datatable_column_order[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		} else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatable_peserta() {
		$this->get_datatable_peserta_query();
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function count_filtered() {
		$this->get_datatable_peserta_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->db->from('peserta');
		$this->db->join('penilaian', 'peserta.peserta_id = penilaian.peserta_id', 'inner');
		$this->db->join('perekomendasi', 'peserta.peserta_id = perekomendasi.peserta_id', 'inner');
		return $this->db->count_all_results();
	}

}

?>