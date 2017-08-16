<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('admin/index');
	}

	public function list($page = 'users') {
		if($page == 'users') {
			$this->load->view('admin/'.$page);
		}
	}

	public function form($page = 'user') {
		if($page == 'user') {
			$this->load->view('admin/form-'.$page);
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
		
		$data_rekruter = array(
			'email' => $_POST['email'],
			'nama'	=> $_POST['nama'],
			'is_koor' => ($_POST['role'] == 1) ? 1 : 0
		);

		unset($_POST['passconf'], $_POST['nama']);

		$result_user = $this->auth_model->insert_registration($this->input->post());
		if($result_user) {
			$result_rekruter = $this->rekruter_model->insert_rekruter($data_rekruter);
			if($result_rekruter) {
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('message', 'Penambahan user berhasil dilakukan');
				redirect(site_url('admin/list/users'), 'refresh');
			}
		}
		$this->auth_model->delete_user($this->input->post('email'));
		$this->session->set_flashdata('status', 'danger');
		$this->session->set_flashdata('message', 'Terjadi kesalahan ketika menyimpan data');
		redirect(site_url('admin/form/user'), 'refresh');
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
}
?>