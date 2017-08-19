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
		if($this->allowed()) {
			$data['title'] = "List Rekruter";
			$data['content'] = $this->load->view('rekruter/list', '', true);
			$this->load->view('template/dashboard-template', $data);
		}
	}

	public function add() {
		if($this->allowed()) {
			$data['title'] = "Form Rekruter";
			$data['content'] = $this->load->view('rekruter/form', '', true);
			$this->load->view('template/dashboard-template', $data);
		}	
	}

	public function do_insert_rekruter() {
		$this->load->library('form_validation');

		$this->load->model('rekruter_model');
		$this->load->model('auth_model');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array(
				'valid_email'		=> 'Email yang anda masukkan tidak valid.',
				'is_unique'			=> 'Email sudah pernah mendaftar.',
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', array('matches' => 'Password dan Konfirmasi Password yang anda masukkan tidak sama'));

		if( $this->form_validation->run() == false) {
			# back to login
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect(site_url('admin/form/user'), 'refresh');
		}

		// encrypt password
		$unencrypt_pass = $this->input->post('password');
		$_POST['password'] = MD5($this->input->post('password'));
		$_POST['username'] = $_POST['email'];

		$data_rekruter = array(
			'email' 				=> $_POST['email'],
			'nama_rekruter'	=> $_POST['nama'],
			'is_koor' 			=> ($_POST['role'] == 1) ? 1 : 0
		);

		unset($_POST['passconf'], $_POST['nama']);

		$result_user = $this->auth_model->insert_registration($this->input->post());
		if($result_user) {
			$result_rekruter = $this->rekruter_model->insert_rekruter($data_rekruter);
			if($result_rekruter) {
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('message', 'Penambahan user berhasil dilakukan');
				redirect(site_url('rekruter/all'), 'refresh');
			}
		}
		$this->auth_model->delete_user($this->input->post('email'));
		$this->session->set_flashdata('status', 'danger');
		$this->session->set_flashdata('message', 'Terjadi kesalahan ketika menyimpan data');
		redirect(site_url('rekruter/form'), 'refresh');
	}

	public function do_update_rekruter() {
		$this->load->model('rekruter_model');

		$result = $this->auth_model->update_rekruter($this->input->post());
		if($result) {
			$this->session->set_flashdata('status', 'success');
			$this->session->set_flashdata('message', 'Perubahan user berhasil dilakukan');
			redirect(site_url('admin/list/users'), 'refresh');
		} else {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'Terjadi kesalahan ketika menyimpan data');
			redirect(site_url('admin/form/user'), 'refresh');
		}
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