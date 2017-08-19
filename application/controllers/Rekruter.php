<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekruter extends CI_Controller {

	public function constructor() {
		parent::__construct();
	}

	public function allowed() {
		if($this->session->userdata('role') < 1) {
			redirect(site_url('404'), 'refresh');
		}
		return true;
	}

	public function index() {
		if($this->allowed()){
			$this->load->model('rekruter_model');
			$data_page['rekruters'] = $this->rekruter_model->read_all_basic_rekruter()->result_array();
			$data['title'] = "List Calon Peserta";
			$data['content'] = $this->load->view('rekruter/dashboard', $data_page, true);
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

	public function nilai($username) {
		if($this->allowed()) {
			// Load Model
			$this->load->model('peserta_model');
			$this->load->model('pencapaian_model');
			$this->load->model('project_model');
			$this->load->model('essay_model');
			$this->load->model('perekomendasi_model');
			$this->load->model('auth_model');
			$this->load->model('jalur_model');

			// setup page variable, result array is faster than else
			$data_page['dasar'] = $this->peserta_model->read_peserta_by_username($username)->result_array();
			$idpeserta = $data_page['dasar'][0]['peserta_id'];
			$data_page['pencapaian'] = $this->pencapaian_model->read_all_pencapaian($idpeserta)->result_array();
			$data_page['project'] = $this->project_model->read_project($idpeserta)->result_array();
			$data_page['essay'] = $this->essay_model->read_essay($idpeserta)->result_array();
			$data_page['rekomendasi'] = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
			$data_page['capes_username'] = $username;

			$jalur = $this->auth_model->get_jalur($username);

			$data_page['jalur'] = $jalur;

			if($jalur == 'nextgen' or $jalur == 'local') {
				$data_page['section']['project'] = true;
			} else {
				$data_page['section']['project'] = false;
			}

			if($jalur == 'nextgen') {
				$data_page['theme'] = 'Bagaimana keberadaan Anda di FIM bisa menambah nilai manfaat untuk FIM?';
			} else if($jalur == 'campus') {
				$data_page['theme'] = 'Rencana strategis Anda di kampus dan bagaimana FIM dapat membantu mewujudkannya?';
			} else if($jalur == 'servant') {
				$data_page['theme'] = 'Bagaimana FIM bisa membantu Anda untuk meningkatkan kualitas diri Anda secara personal sehingga mampu memberikan keuntungan untuk masyarakat?';
		  } else if($jalur == 'expert') {
		  	$data_page['theme'] = 'Tulisan Jurnal (boleh link)';
		  } else {
		  	$data_page['theme'] = '-';
		  }

			if($jalur == 'nextgen' or $jalur == 'campus' or $jalur == 'expert' or $jalur == 'servant') {
				$data_page['section']['essay'] = true;
			} else {
				$data_page['section']['essay'] = false;
			}

			$fb = $data_page['dasar'][0]['fb'];
			$tw = '';
			$ig = $data_page['dasar'][0]['instagram'];
			$blog = $data_page['dasar'][0]['blog'];
			$youtube = $data_page['dasar'][0]['video_profile'];
			
			$fb = ($fb == '') ? '' : '<a href="'.$fb.'" target="blank"><i class="fa fa-facebook-square" alt="facebook" aria-hidden="true"></i></a>';
			$youtube = ($youtube == '') ? '' : '<a href="'.$youtube.'" target="blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';

			if($data_page['dasar'][0]['twitter'] != ''){
			    $tw = $data_page['dasar'][0]['twitter'];
			    if(!strpos($tw,'twitter.com/')){
			        $tw = "https://twitter.com/".$tw;
			    }
			    $tw = '<a href="'.$tw.'" target="blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>';
			} else {
			    $tw = '';
			}
			
			if($data_page['dasar'][0]['instagram'] != ''){
			    $ig = $data_page['dasar'][0]['instagram'];
			    if(!strpos($ig,'instagram.com/')){
			        $ig = "https://instagram.com/".$ig;
			    }
			    $ig = '<a href="'.$ig.'" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
			} else {
			    $ig = '';
			}

			if($data_page['dasar'][0]['blog'] != ''){
			    $blog = $data_page['dasar'][0]['blog'];
			    if(!strpos($blog,'http://') || !strpos($blog,'https://')){
			        $blog = "http://".$blog;
			    }
			    $blog = '<a href="'.$blog.'" target="blank"><i class="fa fa-share-alt-square" alt="blog" aria-hidden="true"></i></a>';
			} else {
			    $blog = '';
			}

			//setup template page variable
			$data['socmed'] = array(
				'fb' 		=> $fb,
				'twitter'	=> $tw,
				'ig'		=> $ig,
				'blog'		=> $blog,
				'video'		=> $youtube,
			);

			$profpic = $data_page['dasar'][0]['profpic_path'];
			$data['header_info'] = array(
				'name' 			=> $data_page['dasar'][0]['fullname'],
				'kota'			=> $data_page['dasar'][0]['kota'],
				'provinsi'	=> $data_page['dasar'][0]['provinsi'],
				'profpic'		=> ($profpic != '') ? $profpic : 'ava-'.$data_page['dasar'][0]['gender'].'.png',
				'jalur'		=> $this->jalur_model->read_jalur($jalur)
			);

			$data['title'] = 'Form Penilaian Capes';
			$data['content'] = $this->load->view('kandidat/profil-nilai', $data_page, true);
			$this->load->view('template/profil-full', $data);
		}
	}

	public function do_nilai($username) {
		if($this->allowed()) {
			$this->load->model('penilaian_model');
			$this->load->model('rekruter_model');
			$this->load->model('peserta_model');

			$peserta_id = $this->peserta_model->get_id('username', $username);
			$rekruter_id = $this->rekruter_model->get_id($this->session->userdata('email'));

			$updated = $this->penilaian_model->udpate_nilai($peserta_id, $rekruter_id, $this->input->post());

			if($updated) {
				// inc jumlah menilai
				$avg = $this->rekruter_model->get_all_avg($rekruter_id);
				$jumlah_menilai = $this->rekruter_model->get_jumlah_menilai($rekruter_id);
				$avg['avg_cv'] = (float($avg['avg_cv']) * float($jumlah_menilai)) + float($_POST['avg_cv']);
				$avg['avg_esai'] = (float($avg['avg_esai']) * float($jumlah_menilai)) + float($_POST['avg_esai']);
				$avg['avg_pencapaian'] = (float($avg['avg_pencapaian']) * float($jumlah_menilai)) + float($_POST['avg_pencapaian']);
				$avg['avg_kelengkapan'] = (float($avg['avg_kelengkapan']) * float($jumlah_menilai)) + float($_POST['avg_kelengkapan']);

				$new_avg['avg_cv'] = $avg['avg_cv'] / (float($jumlah_menilai) + 1);
				$new_avg['avg_esai'] = $avg['avg_esai'] / (float($jumlah_menilai) + 1);
				$new_avg['avg_pencapaian'] = $avg['avg_pencapaian'] / (float($jumlah_menilai) + 1);
				$new_avg['avg_kelengkapan'] = $avg['avg_kelengkapan'] / (float($jumlah_menilai) + 1);

				$this->rekruter_model->update_avg($rekruter_id, $new_avg);
				$this->rekruter_model->update_jumlah_menilai($rekruter_id);

			}
			redirect('rekruter/nilai/'.$username, 'refresh');
		}
	}

	public function do_assign() {
		$this->load->model('penilaian_model');
		$this->load->model('rekruter_model');

		$rekruter_id = $this->rekruter_model->get_id($this->input->post('rekruter'));
		$capes = $this->input->post('capes');

		foreach ($capes as $user) {
			$this->penilaian_model->create_penugasan($rekruter_id, $user);
		}

		echo json_encode([true]);
	}

	public function peserta_list() {
		$table = 'peserta';
		$this->load->model('rekruter_model');
		if($this->input->post('email') != null){
			$rekruter_id = $this->rekruter_model->get_id($this->input->post('email'));
			$list = $this->rekruter_model->get_datatable_for_rekruter($rekruter_id);
		} else {
			$list = $this->rekruter_model->get_datatable($table);
		}
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
				$pesertas['nilai_pencapaian'],
				$pesertas['nilai_kelengkapan'],
				$pesertas['nilai_total'],
				$pesertas['nama_rekruter'],
				$pesertas['username']
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