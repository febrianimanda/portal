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

	public $rekruter_table = 'rekruter';
	public $rekruter_column = array('nama_rekruter', 'email', 'avg_cv', 'avg_esai', 'avg_berkas', 'avg_total', 'jumlah_menilai', 'is_koor');
	public $rekruter_column_order = array(null, 'rekruter_id', 'nama_rekruter', 'email', 'avg_cv', 'avg_esai', 'avg_berkas', 'avg_total', 'jumlah_menilai', 'is_koor');
	public $rekruter_column_search = array('email', 'nama_rekruter');
	public $rekruter_order = array('nama_rekruter' => 'asc');

	public $peserta_table = 'peserta';
	public $peserta_column = array('peserta.peserta_id as peserta_id', 'peserta.profpic_path as profpic_path', 'user.jalur as jalur', 'peserta.fullname as fullname', 'peserta.institusi as institusi', 'peserta.biodata_singkat as biodata_singkat', 'peserta.video_profile as video_profile', 'perekomendasi.file_rekomendasi_path as file_rekomendasi_path', 'penilaian.nilai_cv as nilai_cv', 'penilaian.nilai_esai as nilai_esai', 'penilaian.nilai_project as nilai_project', 'penilaian.nilai_kelengkapan as nilai_kelengkapan', 'penilaian.nilai_total as nilai_total', 'rekruter.nama_rekruter');

	public $peserta_column_order = array(null, 'peserta_id', 'profpic_path', 'jalur', 'fullname', 'institusi', 'biodata_singkat', 'video_profile', ' file_rekomendasi_path', 'nilai_cv', 'nilai_esai', 'nilai_project', 'nilai_kelengkapan', 'nilai_total', 'nama_rekruter');

	public $peserta_column_search = array('jalur', 'fullname', 'institusi');
	public $peserta_order = array('fullname' => 'asc');

	public function get_datatable_query($table='rekruter') {
		if($table == 'peserta') {
			$this->db->select($this->peserta_column);
			$this->db->from($this->peserta_table);
			$this->db->join('user', 'peserta.email = user.email', 'inner');
			$this->db->join('penilaian', 'peserta.peserta_id = penilaian.peserta_id', 'left');
			$this->db->join('perekomendasi', 'peserta.peserta_id = perekomendasi.peserta_id', 'left');
			$this->db->join('rekruter', 'penilaian.rekruter_id = rekruter.rekruter_id', 'left');
			$this->db->where(array('peserta.is_completed' => 1, 'peserta.is_deleted' => 0));
		} else {
			$this->db->select($this->rekruter_column);
			$this->db->from($this->rekruter_table);
			$this->db->where('is_deleted', 0);
		}

		$datatable_column_search = ($table=='peserta') ? $this->peserta_column_search : $this->rekruter_column_search;

		$i = 0;

		foreach ($datatable_column_search as $item) {
			if($_POST['search']['value']) { //search condition
				if($i === 0) {
					$this->db->group_start(); // open bracket clause
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($datatable_column_search) - 1 == $i) {
					$this->db->group_end(); //close bracket clause
				}
			}
			$i++;
		}

		$datatable_column_order = ($table=='peserta') ? $this->peserta_column_order : $this->rekruter_column_order;

		$datatable_order = ($table=='peserta') ? $this->peserta_order : $this->rekruter_order;

		if(isset($_POST['order'])) {
			$this->db->order_by($datatable_column_order[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		} else if(isset($datatable_order)) {
			$order = $datatable_order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatable($table = 'rekruter') {
		$this->get_datatable_query($table);
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function count_filtered($table = 'rekruter') {
		$this->get_datatable_query($table);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table = 'rekruter') {
		if($table == 'peserta') {
			$this->db->from('peserta');
			$this->db->join('penilaian', 'peserta.peserta_id = penilaian.peserta_id', 'inner');
			$this->db->join('perekomendasi', 'peserta.peserta_id = perekomendasi.peserta_id', 'inner');
			return $this->db->count_all_results();
		} else {
			$this->db->from('rekruter');
			return $this->db->count_all_results();
		}
	}

}

?>