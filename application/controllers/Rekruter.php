<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekruter extends CI_Controller {

	public function constructor() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('admin/dashboard');
	}

	public function peserta_list() {
		$this->load->model('rekruter_model');

		$list = $this->rekruter_model->get_datatable_peserta();
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
			'recordsTotal' => $this->rekruter_model->count_all(),
			'recordsFiltered' => $this->rekruter_model->count_filtered(),
			'data' => $data
		);

		echo json_encode($output);
	}

}
?>