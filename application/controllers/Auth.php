<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public $title = "Authentication";

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index() {
		$this->load->view('template/header',array('title'=> 'Login'));
		$this->load->view('auth/login');
		$this->load->view('template/footer');
	}

	public function registration() {
		$this->load->view('template/header',array('title'=> 'Registration'));
		$this->load->view('auth/signup');
		$this->load->view('template/footer');
	}

	public function do_registration() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if( $this->form_validation->run() == false) {
			# back to login
			echo validation_errors();
			// redirect('auth/registration', 'refresh');
		}

		$data = array(
			'email'			=> $this->input->post('email'),
			'password'	=> MD5($this->input->post('password'))
		);

		$result = $this->auth_model->insert_registration($data);
		if($result) {
			# success create new user
			echo "User berhasil disimpan";
		} else {
			# failed to register because email exist
			echo "User gagal disimpan";
		}

	}

	public function do_login() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if( $this->form_validation->run() == false) {
			echo isset($this->session->userdata['logged_in']);
			if(isset($this->session->userdata['logged_in'])) {
				# redirect success page
				redirect(base_url('dashboard'));
			}
			# back to login
			redirect('auth/', 'refresh');
		}
		
		$data = array(
			'email'			=> $this->input->post('email'),
			'password'	=> MD5($this->input->post('password'))
		);
		$success = $this->auth_model->login_validation($data);
		
		if($success) {
			$user = $this->auth_model->read_user_information($data['email']);
			$session_data = array(
				'email'	=> $user[0]->email,
				'role'	=> $user[0]->role
			);
			$this->session->set_userdata('logged_in', $session_data);
			if($user[0]->role == 0 ) { 
				#redirect peserta
			} else if ($user[0]-> role >= 1 && $user[0]-> role <= 3) {
				#redirect admin
				redirect('/dashboard');
			} else {
				#something is wrong in here
				redirect('/auth');
			}
		} else {
			# error login
			redirect('/auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('/auth', 'refresh');
	}
}
