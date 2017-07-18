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
		$data['content'] = $this->load->view('auth/login', '', true);
		
		$this->load->view('template/full-template', $data);
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
		$this->load->model('info_model');
		$this->load->model('jalur_model');
		$data_page['info'] = $this->info_model->read_all_info()->result();
		$data_page['jalur'] = $this->jalur_model->read_all_jalur()->result();
		// Setup Page Content
		$data['title'] = "Form Pendaftaran";
		$data['content'] = $this->load->view('auth/signup', $data_page, true);

		// Load Page 
		$this->load->view('template/full-template', $data);
	}

	public function do_registration() {
		// Load Model
		$this->load->model('info_model');
		$this->load->model('auth_model');
		$this->load->model('peserta_model');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array(
				'valid_email'		=> 'Email yang anda masukkan tidak valid.',
				'is_unique'			=> 'Email sudah pernah mendaftar.',
			)
		);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array( 'is_unique'	=> 'Username sudah pernah digunakan.')
		);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', array('matches' => 'Password dan Konfirmasi Password yang anda masukkan tidak sama'));

		if( $this->form_validation->run() == false) {
			# back to login
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect('auth/registration', 'refresh');
		}
		
		// encrypt password
		$unencrypt_pass = $this->input->post('password');
		$_POST['password'] = MD5($this->input->post('password'));

		$arr_info = $_POST['info_fim'];
		$data_info = implode(',', $arr_info);
		// data for peserta table
		$data_peserta = array(
			'username' 	=> $_POST['username'],
			'email' 		=> $_POST['email'],
			'info_fim' 	=> $data_info
		);

		unset($_POST['passconf'], $_POST['info_fim']);

		$_POST['hash'] = MD5($_POST['username'].rand(0,10000));

		$result1 = $this->auth_model->insert_registration($this->input->post());
		$result2 = $this->peserta_model->insert_peserta($data_peserta);

		if($result1 and $result2) {
			# Update another records after successfull saving
			# Update Jumlah Jalur
			// $this->jalur_model->update_jumlah($this->input->post('jalur'));
			
			# Update jumlah provinsi
			// $prov = $this->provinsi_model->read_provinsi('nama_provinsi', $this->input->post('provinsi'))->result();
			// $this->provinsi_model->update_jumlah($prov[0]->key);

			# Add or Update Institusi table
			// $ins_exist = $this->institusi_model->is_exist($this->input->post('institusi'));
			// if(!$ins_exist) {
			// 	# adding new institusi record
			// 	$data_institusi = array('nama_institusi' => $this->input->post('institusi'), 'jumlah' => 1);
			// 	$this->institusi_model->insert_institusi($data_institusi);
			// } else {
			// 	# increasing jumlah
			// 	$ins_id = $this->institusi_model->read_institusi_id('nama_institusi', $this->input->post('institusi'));
			// 	$this->institusi_model->update_jumlah($ins_id);
			// }

			# Update jumlah agama
			// $this->agama_model->update_jumlah('agama', $_POST['agama']);

			# Update jumlah informasi fim
			foreach ($arr_info as $info) {
				$this->info_model->update_jumlah('keterangan', $info);
			}
			# success create new user
			$this->send_confirmation($_POST['email'], $_POST['username'], $unencrypt_pass, $_POST['hash']);
			redirect(site_url('auth/regis_success'), 'refresh');
		} else {
			# failed to register because email exist
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'Ada kesalahan dalam menyimpan data Anda. Silahkan coba untuk mendaftar kembali.');
			redirect(site_url('auth/registration'), 'refresh');
		}

	}

	public function regis_success() {
		// Setup Page Content
		$data['title'] = "Pendaftaran Berhasil";
		$data['content'] = $this->load->view('auth/success', '', true);

		// Load Page 
		$this->load->view('template/full-template', $data);
	}

	public function do_login() {
		$this->load->model('peserta_model');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if( $this->form_validation->run() == false) {
			if(isset($this->session->userdata['logged_in'])) {
				# redirect success page
				redirect(base_url('dashboard'));
			}
			# back to login
			redirect('auth/', 'refresh');
		}
		$nonxss_email = $this->input->post('email');
		$data = array(
			'email'			=> $this->security->xss_clean($nonxss_email),
			'password'	=> MD5($this->input->post('password'))
		);
		$success = $this->auth_model->login_validation($data);
		
		if($success) {
			$user = $this->auth_model->read_user_information($data['email'])->result_array();
			$session_data = array(
				'email'			=> $user[0]['email'],
				'username'	=> $user[0]['username'],
				'role'			=> $user[0]['role'],
				'jalur'			=> $user[0]['jalur'],
				'logged_in'	=> true,
			);
			$this->session->set_userdata($session_data);
			if($session_data['role'] == 0 ) { 
				#redirect peserta
				redirect('/kandidat');
			} else if ($session_data['role'] >= 1 && $session_data['role'] <= 3) {
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

  public function send_confirmation($user_email, $username, $user_password, $hash) {
  	$config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => 'ssl://smtp.googlemail.com',
	    'smtp_port' => 465,
	    'smtp_user' => 'febrian.imanda@gmail.com',
	    'smtp_pass' => 'gmail12345,./',
	    'mailtype'  => 'html', 
	    'charset'   => 'iso-8859-1'
		);
  	$this->load->library('email', $config);
  	$this->email->set_newline("\r\n");

  	$subject = "Tautan Verifikasi Pendaftaran Forum Indonesia Muda 19";
  	$message = '
  		Terima Kasih sudah menjadi bagian para pemuda perubahan, '.$username.'!
      
			Akun Anda sudah berhasil dibuat.
      Berikut detail keterangan untuk login akun Anda.
      -------------------------------------------------
      Email   : ' . $user_email . '
      Password: ' . $user_password . '
      -------------------------------------------------
      Pastikan untuk menjaga kerahasiaan akun Anda.

      Untuk mengaktifkan akun Anda, silahkan klik tautan di bawah ini:    
      ' . base_url() . '/auth/verify?' . 
      'email=' . $user_email . '&hash=' . $hash;

    $this->email->from('febrian.imanda@gmail.com', 'Febrian Imanda');
    $this->email->to($user_email);
		$this->email->subject($subject);
		$this->email->message($message);
		$result = $this->email->send();
  }

  public function verify() {
  	$this->load->model('auth_model');
  	
  	$result = $this->auth_model->get_hash($_GET['email']);
  	if($result) {
  		if($result['hash'] == $_GET['hash']) {
  			$this->auth_model->verify_user($_GET['email']);
  			$user = $this->auth_model->read_user_information($_GET['email'])->result_array();
  			$session_data = array(
					'email'			=> $user[0]['email'],
					'username'	=> $user[0]['username'],
					'role'			=> $user[0]['role'],
					'jalur'			=> $user[0]['jalur'],
					'logged_in'	=> true,
				);
  			$this->session->set_flashdata('status', 'success');
  			$this->session->set_flashdata('message', 'Akun Anda telah diverifikasi, silahkan lengkapi data Anda untuk melanjutkan proses pendaftaran.');
  			header('refresh=5; url='.site_url('kandidat/pengaturan/dasar'));
  		} else {
  			$this->session->set_flashdata('status', 'danger');
  			$this->session->set_flashdata('message', 'Ada kesalahan dalam kode verifikasi anda. Silahkan hubungi tim IT kami.');
				header('refresh=0;url='.site_url('auth'));
  		}
  	} else {
  		$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'Email anda belum terdaftar. Silahkan daftar terlebih dahulu.');
			header('refresh=0;url='.site_url('auth'));
  	}
  }

}
