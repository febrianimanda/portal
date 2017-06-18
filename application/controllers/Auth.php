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
		$data['title'] = "Login";
		$data['content'] = $this->load->view('auth/login');
		
		$this->load->view('template/full-template');
	}

	public function forgot() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if($this->form_validation->run() == false){
			#ada kesalahan di form
		} else {
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean($email);
			$user_info = $this->auth_model->read_user_information($clean);

			if(!$user_info){
				$this->session->set_flashdata('Failed','Email Address Tidak Dikenal, silahkan coba lagi!');
				redirect(site_url('auth/reset'), 'refresh');
			}

			#build token
			$token = $this->auth_model->insert_token($user_info->email);
			$qstring = $this->base64url_encode($token);
			$url = site_url().'/auth/reset/token/'.$qstring;
			$link = '<a href="'.$url.'">'.$url.'</a>';

			$message = '';
			$message .= '<p><strong>Hai, anda menerima email ini karena ada permintaan untuk memperbarui password anda</strong>';
			$message .= '<strong>Silahkan klik link berikut ini untuk mengganti password: </strong>'.$link.'</p>';
			$message .= '<p>Jika anda tidak merasa melakukan permintaan ini, silahkan abaikan email ini</p>';

			echo $message;
			exit;
		}
	}

	public function reset() {
		$token = $this->base64url_decode($this->uri->segment(4));
		$clean_token = $this->security->xss_clean($token);

		$user_info = $this->auth_model->is_token_valid($cleantoken);

		if(!$user_info){
			$this->session->set_flashdata('Failed','Token tidak valid atau kadaluarsa');
			redirect(site_url('auth'), 'refresh');
		}

		$data = array(
			'title'	=> 'Reset Password',
			'email'	=> $user_info->email,
			'token'	=> $this->base64url_encode($token),
		);

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation','required|matches[password]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('auth/reset_password', $data);
		} else {
			$post = $this->input->post();
			$clean_post = $this->security->xss_clean($post);
			$hashed = MD5($clean_post['password']);
			$clean_post['password'] = $hashed;
			$clean_post['email'] = $user_info->email;
			unset($clean_post['passconf']);
			if(!$this->auth_model->update_password($clean_post)){
				#gagal update
				$this->session->set_flashdata('Failed', 'Terdapat kesalahan, Password gagal diubah');
			} else {
				#update success
				$this->session->set_flashdata('Success', 'Password anda sudah diperbarui. Silahkan Login');
			}
			redirect(site_url('auth/'), 'refresh');
		}
	}

	public function registration() {
		// Load Model
		$this->load->model('agama_model');
		$this->load->model('jalur_model');
		$this->load->model('provinsi_model');
		$this->load->model('info_model');

		// setup page variable
		$data_page['agama'] = $this->agama_model->read_all_agama()->result();
		$data_page['jalur'] = $this->jalur_model->read_all_jalur()->result();
		$data_page['provinsi'] = $this->provinsi_model->read_all_provinsi()->result();
		$data_page['info'] = $this->info_model->read_all_info()->result();

		// Setup Page Content
		$data['title'] = "Form Pendaftaran";
		$data['content'] = $this->load->view('auth/signup', $data_page);

		// Setup Page Dynamic CSS and JS
		$data['header_css_file'] = ['bootstrap-tagsinput'];
		$data['footer_js_file'] = ['bootstrap-tagsinput'];

		// Load Page 
		$this->load->view('template/full-template', $data);
	}

	public function do_registration() {
		$this->load->model('peserta_model');
		$this->load->model('jalur_model');
		$this->load->model('provinsi_model');
		$this->load->model('info_model');
		$this->load->model('institusi_model');
		$this->load->model('agama_model');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array(
				'valid_email'		=> 'Email yang anda masukkan tidak valid.',
				'is_unique'			=> 'Email sudah terdaftar.',
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'required');	
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if( $this->form_validation->run() == false) {
			# back to login
			print validation_errors();
			die();
			// redirect('auth/registration', 'refresh');
		}
		
		// encrypt password
		$_POST['password'] = MD5($this->input->post('password'));

		// data for user table
		$data_user = array(
			'email' 		=> $_POST['email'],
			'password'	=> $_POST['password'],
			'jalur'			=> $_POST['jalur']
		);
		$data_info = $_POST['info_fim'];
		$_POST['info_fim'] = implode(',', $data_info);
		// data for peserta table
		unset($_POST['password'], $_POST['jalur'], $_POST['passconf']);

		$result = $this->auth_model->insert_registration($data_user);
		$result2 = $this->peserta_model->insert_peserta($this->input->post());

		if($result and $result2) {
			# Update another records after successfull saving
			# Update Jumlah Jalur
			$this->jalur_model->update_jumlah($this->input->post('jalur'));
			
			# Update jumlah provinsi
			$prov = $this->provinsi_model->read_provinsi('nama_provinsi', $this->input->post('provinsi'))->result();
			$this->provinsi_model->update_jumlah($prov[0]->key);

			# Add or Update Institusi table
			$ins_exist = $this->institusi_model->is_exist($this->input->post('institusi'));
			if(!$ins_exist) {
				# adding new institusi record
				$data_institusi = array('nama_institusi' => $this->input->post('institusi'), 'jumlah' => 1);
				$this->institusi_model->insert_institusi($data_institusi);
			} else {
				# increasing jumlah
				$ins_id = $this->institusi_model->read_institusi_id('nama_institusi', $this->input->post('institusi'));
				$this->institusi_model->update_jumlah($ins_id);
			}

			# Update jumlah agama
			$this->agama_model->update_jumlah('agama', $_POST['agama']);

			# Update jumlah informasi fim
			foreach ($data_info as $info) {
				$this->info_model->update_jumlah('keterangan', $info);
			}
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

	public function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

  public function base64url_decode($data) {
  	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }   
}
