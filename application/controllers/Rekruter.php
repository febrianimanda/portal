<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekruter extends CI_Controller {

	public function constructor() {
		parent::__construct();
	}

	public function allowed() {
		if($this->session->userdata('role') < 2) {
			redirect(site_url('404'), 'refresh');
		}
		return true;
	}

	public function index() {
		if($this->allowed()){
			$data['title'] = "List Calon Peserta";
			$data['content'] = $this->load->view('rekruter/dashboard', '', true);
			$this->load->view('template/dashboard-template', $data);
		}
	}

	public function all() {
		$data['title'] = "List Rekruter";
		$data['content'] = $this->load->view('rekruter/rekruter-list', '', true);
		$this->load->view('template/dashboard-template', $data);
	}

	public function peserta_list() {
		$table = 'peserta';

		$this->load->model('rekruter_model');

		$list = $this->rekruter_model->get_datatable($table);
		$data = array();
		$no = $_POST['start'];
		foreach($list as $pesertas) {
			$no++;
			$row = array(
				$no,
				$pesertas['peserta_id'],
				$pesertas['profpic_path'],
				$pesertas['jalur'],
				$pesertas['fullname'],
				$pesertas['institusi'],
				$pesertas['biodata_singkat'],
				$pesertas['video_profile'],
				$pesertas['file_rekomendasi_path'],
				$pesertas['nilai_cv'],
				$pesertas['nilai_esai'],
				$pesertas['nilai_project'],
				$pesertas['nilai_kelengkapan'],
				$pesertas['nilai_total']
			);
			$data[] = $row;
		}

		$output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->rekruter_model->count_all($table),
			'recordsFiltered' => $this->rekruter_model->count_filtered($table),
			'data' => $data
		);

		echo json_encode($output);
	}

	public function rekruter_list() {
		$table = 'rekruter';
		if($this->session->userdata('email') == null || $this->session->userdata('email') == "") {
			return null;
		}
		$this->load->model('rekruter_model');

		$list = $this->rekruter_model->get_datatable($table);
		$data = array();
		$no = $_POST['start'];
		foreach($list as $rekruters) {
			$no++;
			$row = array(
				$no,
				$rekruters['rekruter_id'],
				$rekruters['nama_rekruter'],
				$rekruters['email'],
				$rekruters['jumlah_ditugaskan'],
				$rekruters['jumlah_menilai'],
				$rekruters['avg_cv'],
				$rekruters['avg_esai'],
				$rekruters['avg_pencapaian'],
				$rekruters['avg_berkas'],
				$rekruters['avg_total'],
				$rekruters['is_koor']
			);
			$data[] = $row;
		}

		$output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->rekruter_model->count_all($table),
			'recordsFiltered' => $this->rekruter_model->count_filtered($table),
			'data' => $data
		);

		echo json_encode($output);
	}

}
?>