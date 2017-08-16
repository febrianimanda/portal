<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function index() {
		#same as profil page
		if($this->session->userdata('logged_in')){
			$this->profil($this->session->userdata('username'));
		} else {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'Silahkan login terlebih dahulu');
			redirect(site_url('auth/'), 'refresh');
		}
	}

		public function nilaiprofil($username='') {
		// Load Model
		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');
		$this->load->model('project_model');
		$this->load->model('essay_model');
		$this->load->model('perekomendasi_model');
		$this->load->model('auth_model');
		$this->load->model('jalur_model');

		if($username == ''){
			$username = $this->session->userdata('username');
		}

		// setup page variable, result array is faster than else
		$data_page['dasar'] = $this->peserta_model->read_peserta_by_username($username)->result_array();
		$idpeserta = $data_page['dasar'][0]['peserta_id'];
		$data_page['pencapaian'] = $this->pencapaian_model->read_all_pencapaian($idpeserta)->result_array();
		$data_page['project'] = $this->project_model->read_project($idpeserta)->result_array();
		$data_page['essay'] = $this->essay_model->read_essay($idpeserta)->result_array();
		$data_page['rekomendasi'] = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
		$data_page['is_me'] = ($this->session->userdata('username') == $username);

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

		// Setup page content
		$data['title'] = 'Profil Kandidat';
		$data['content'] = $this->load->view('kandidat/profil-nilai', $data_page, true);

		$this->load->view('template/nilai-profil', $data);
	}

	public function profil($username='') {
		// Load Model
		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');
		$this->load->model('project_model');
		$this->load->model('essay_model');
		$this->load->model('perekomendasi_model');
		$this->load->model('auth_model');
		$this->load->model('jalur_model');

		if($username == ''){
			$username = $this->session->userdata('username');
		}

		// setup page variable, result array is faster than else
		$data_page['dasar'] = $this->peserta_model->read_peserta_by_username($username)->result_array();
		$idpeserta = $data_page['dasar'][0]['peserta_id'];
		$data_page['pencapaian'] = $this->pencapaian_model->read_all_pencapaian($idpeserta)->result_array();
		$data_page['project'] = $this->project_model->read_project($idpeserta)->result_array();
		$data_page['essay'] = $this->essay_model->read_essay($idpeserta)->result_array();
		$data_page['rekomendasi'] = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
		$data_page['is_me'] = ($this->session->userdata('username') == $username);

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

		// Setup page content
		$data['title'] = 'Profil Kandidat';
		$data['content'] = $this->load->view('kandidat/profil', $data_page, true);

		$this->load->view('template/profil-full', $data);
	}

	public function pengaturan($page='') {
		if(!isset($page) or $page=='') {
			$page = 'dasar';
		}

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		//load model
		$this->load->model('peserta_model');
		$this->load->model('essay_model');
		$this->load->model('perekomendasi_model');
		$this->load->model('project_model');
		$this->load->model('pencapaian_model');
		$this->load->model('komitmen_model');
		$this->load->model('jalur_model');

		$username = $this->session->userdata('username');
		$idpeserta = $this->peserta_model->get_id('username', $username);
		$option = '';

		$jalur = $this->session->userdata('jalur');
		if($jalur == 'campus'){
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> true,
				'rekomendasi'	=> true,
			);
		} else if ($jalur == 'local') {
			$data_page['menu'] = array(
				'project' 		=> true,
				'essay' 			=> false,
				'rekomendasi'	=> true,
			);
		} else if ($jalur == 'influencer') {
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> false,
				'rekomendasi'	=> false,
			);
		} else if ($jalur == 'professional') {
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> false,
				'rekomendasi'	=> true,
			);
		} else if ($jalur == 'expert') {
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> true,
				'rekomendasi'	=> false,
			);
		} else if ($jalur == 'servant') {
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> true,
				'rekomendasi'	=> true,
			);
		} else if ($jalur == 'military') {
			$data_page['menu'] = array(
				'project' 		=> false,
				'essay' 			=> false,
				'rekomendasi'	=> true,
			);
		} else {
			$data_page['menu'] = array(
				'project' 		=> true,
				'essay' 			=> true,
				'rekomendasi'	=> true,
			);
		}

		$basic_ready = ($this->peserta_model->is_ready($idpeserta) == 1);
		$project_ready = ($this->project_model->is_ready($idpeserta) == 1);
		$pencapaian_ready = ($this->pencapaian_model->is_ready($idpeserta) == 1);
		$rekomendasi_ready = ($this->perekomendasi_model->is_ready($idpeserta) == 1);
		$essay_ready = ($this->essay_model->is_ready($idpeserta) == 1);
		$video_ready = ($this->peserta_model->is_video_exist($idpeserta) == 1);

		$data_page['menu_ready'] = array(
			'dasar' 	=> $basic_ready,
			'project'	=> $project_ready,
			'pencapaian'	=> $pencapaian_ready,
			'rekomendasi'	=> $rekomendasi_ready,
			'essay'		=> $essay_ready,
			'video'		=> $video_ready
		);

		$data_page['completed'] = ($this->peserta_model->is_completed($idpeserta) == 1);

		if($page == 'dasar') {
			// Load Model
			$this->load->model('agama_model');
			$this->load->model('provinsi_model');
			$this->load->model('info_model');

			// setup page variable
			$data_page['data'] = $this->peserta_model->read_peserta_by_username($username)->result_array()[0];
			$data_page['agama'] = $this->agama_model->read_all_agama()->result_array();
			$data_page['jalur'] = $this->jalur_model->read_all_jalur()->result_array();
			$data_page['provinsi'] = $this->provinsi_model->read_all_provinsi()->result_array();
			$data_page['info'] = $this->info_model->read_all_info()->result_array();

			$data_page['data']['birthdate'] = date("m/d/Y", strtotime($data_page['data']['birthdate']));

			// Setup Page Dynamic CSS and JS
			$data['header_css_file'] = ['bootstrap-tagsinput'];
			$data['header_css_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.css'];
			$data['footer_js_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.js'];
			$data['footer_js_file'] = ['bootstrap-tagsinput'];
		} else if ($page == 'rekomendasi') {
			$obj_rekomendasi = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
			$exist = (sizeof($obj_rekomendasi) > 0);

			$data_page['data'] = array(
				'nama_perekomendasi' 		=> ($exist) ? $obj_rekomendasi[0]['nama_perekomendasi'] : "",
				'file_rekomendasi_path' => ($exist) ? $obj_rekomendasi[0]['file_rekomendasi_path'] : "",
				'status' 								=> ($exist) ? "update" : "insert",
			);
		} else if ($page == 'essay') {
			$obj_essay = $this->essay_model->read_essay($idpeserta)->result_array();
			$exist = (sizeof($obj_essay) > 0);

			if($jalur == 'nextgen') {
				$theme = 'Bagaimana keberadaan Anda di FIM bisa menambah nilai manfaat untuk FIM?';
			} else if($jalur == 'campus') {
				$theme = 'Rencana strategis Anda di kampus dan bagaimana FIM dapat membantu mewujudkannya?';
			} else if($jalur == 'servant') {
				$theme = 'Bagaimana FIM bisa membantu Anda untuk meningkatkan kualitas diri Anda secara personal sehingga mampu memberikan keuntungan untuk masyarakat?';
		  } else if($jalur == 'expert') {
		  	$option = '-expert';
		  }	else {
				$theme = 'Anda tidak diwajibkan untuk mengisi bagian ini';
			}

			$data_page['data'] = array(
				'konten'	=> ($exist) ? $obj_essay[0]['konten'] : "",
				'status' 	=> ($exist) ? "update" : "insert",
				'theme'	=> $theme
			);
		} else if ($page == 'project') {
			$obj_project = $this->project_model->read_project($idpeserta)->result_array();
			$exist = (sizeof($obj_project) > 0);
			if($jalur == 'nextgen') {
				$obj_field = array('hasil_magang', 'peran', 'lokasi', 'kegiatan', 'sumberdaya', 'timeline');
			} else {
				$obj_field = array('nama_project', 'jenis', 'peran', 'lokasi', 'kegiatan', 'sumberdaya', 'supported_fim');
			}

			foreach ($obj_field as $field) {
				if($exist)
					$data_page['data'][$field] = $obj_project[0][$field];
				else
					$data_page['data'][$field] = "";
			}

			if($jalur == 'nextgen') {
				$option = '-nextgen';
			}

			$data_page['data']['status'] = ($exist) ? "update" : "insert";
		} else if($page == 'pencapaian') {
			if($jalur == 'nextgen' or $jalur == 'campus' or $jalur == 'local') {
				$constraint = 5;
			} else if($jalur == 'influencer' or $jalur == 'professional' or $jalur == 'servant') {
				$constraint = 3;
			} else {
				$constraint = 1;
			}

			$query_pencapaian = $this->pencapaian_model->read_all_pencapaian($idpeserta);
			$data_page['data_count'] = $query_pencapaian->num_rows();
			if($query_pencapaian->num_rows() > 0){
				$data_page['pencapaian'] = $query_pencapaian->result_array();
			}
			
			$option = ($jalur == 'influencer') ? '-influencer' : '';

			$data_page['max_count'] = $constraint;
		} else if($page == 'komitmen') { 
			$obj_komitmen = $this->komitmen_model->read_komitmen($idpeserta)->result_array();
			$data_page['ready'] = false;

			$ready = true;
			$data_page['need_message'] = '';
			if($jalur == 'nextgen'){
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$project_ready){
					$data_page['need_message'] .= '<li>Project</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if(!$rekomendasi_ready){
					$data_page['need_message'] .= '<li>Rekomendasi</li>';
					$ready = false;
				}
				if(!$essay_ready){
					$data_page['need_message'] .= '<li>Essay</li>';
					$ready = false;
				}
				if(!$video_ready){
					$data_page['need_message'] .= '<li>Video Profile</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'campus'){
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$essay_ready){
					$data_page['need_message'] .= '<li>Essay</li>';
					$ready = false;
				}
				if(!$rekomendasi_ready){
					$data_page['need_message'] .= '<li>Rekomendasi</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'local') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$project_ready){
					$data_page['need_message'] .= '<li>Project</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'influencer') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if(!$video_ready){
					$data_page['need_message'] .= '<li>Video Profile</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'professional') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if(!$rekomendasi_ready){
					$data_page['need_message'] .= '<li>Rekomendasi</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'expert') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if(!$essay_ready){
					$data_page['need_message'] .= '<li>Essay</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'servant') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if(!$essay_ready){
					$data_page['need_message'] .= '<li>Essay</li>';
					$ready = false;
				}
				if(!$rekomendasi_ready){
					$data_page['need_message'] .= '<li>Rekomendasi</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			} else if($jalur == 'military') {
				if(!$basic_ready){
					$data_page['need_message'] .= '<li>Informasi Dasar</li>';
					$ready = false;
				}
				if(!$pencapaian_ready){
					$data_page['need_message'] .= '<li>Pencapaian</li>';
					$ready = false;
				}
				if($basic_ready and $pencapaian_ready and $rekomendasi_ready){
					$data_page['ready'] = true;
				}
				if(!$rekomendasi_ready){
					$data_page['need_message'] .= '<li>Rekomendasi</li>';
					$ready = false;
				}
				if($ready) {
					$data_page['ready'] = true;
				}
			}

			$exist = (sizeof($obj_komitmen) > 0);
			$data_page['data'] = array(
				'pernyataan'	=> ($exist) ? $obj_komitmen[0]['pernyataan'] : "",
				'pilihan'	=> ($exist) ? $obj_komitmen[0]['pilihan'] : "",
				'penempatan'	=> ($exist) ? $obj_komitmen[0]['penempatan'] : "",
				'status' 	=> ($exist) ? "update" : "insert"
			);
		} else {
			// 404 page
		}

		if(!isset($data_page)){
			$data['content'] = $this->load->view('kandidat/f-'.$page.$option, '', true);
		} else {
			$data['content'] = $this->load->view('kandidat/f-'.$page.$option, $data_page, true);
		}

		$data['title'] = "Pengaturan ".$page;
		$header_info = $this->peserta_model->get_header_info('username', $username);
		$data['header_info'] = array(
			'name' 			=> $header_info['fullname'],
			'kota'			=> $header_info['kota'],
			'provinsi'	=> $header_info['provinsi'],
			'profpic'		=> ($header_info['profpic_path'] != '') ? $header_info['profpic_path'] : 'ava-'.$header_info['gender'].'.png',
			'jalur'			=> $this->jalur_model->read_jalur($this->session->userdata('jalur'))
		);
		$this->load->view('template/profil-full', $data);
	}

	public function do_update_dasar(){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->library('form_validation');

		$this->load->model('peserta_model');
		$this->load->model('auth_model');
		$this->load->model('provinsi_model');
		$this->load->model('institusi_model');
		$this->load->model('agama_model');

		$username = $this->session->userdata('username');
		$idpeserta = $this->peserta_model->get_id('username', $username);
		// for updating statistics purpose
		$ext_data = $this->peserta_model->read_ext_data($username)->result_array()[0];

		// Upload Profpic
		if($_FILES['profpic_path']['name'] != ""){
			if(!$this->do_check_image('profpic_path', 'profpic')) {
				redirect(site_url('/kandidat/pengaturan/dasar'), 'refresh');
			}
			$img = explode('.',$_FILES['profpic_path']['name']);
			$extension_img = end($img);
			$profpic_filename = $username.'.'.strtolower($extension_img);
			// Upload image
			$this->do_upload_profpic('profpic_path', $profpic_filename);
			$_POST['profpic_path'] = $profpic_filename;
		}

		// upload KTP
		if($_FILES['ktp_path']['name'] != ""){
			if(!$this->do_check_image('ktp_path', 'ktp')) {
				redirect(site_url('/kandidat/pengaturan/dasar'), 'refresh');
			}
			$img = explode('.', $_FILES['ktp_path']['name']);
			$extension_img = end($img);
			$ktp_filename = MD5('ktp_'.$username).'.'.strtolower($extension_img);
			//uppload image
			$this->do_upload_ktp('ktp_path', $ktp_filename);
			$_POST['ktp_path'] = $ktp_filename;
		}

		$_POST['is_ready'] = 1;
		if($_POST['video_profile'] != ''){
			$_POST['is_video_exist'] = 1;
		}
		$_POST['birthdate'] = date('Y-m-d', strtotime($_POST['birthdate']));

		// check if change username
		$is_change_username = false;
		if($username != $_POST['username']) {
			$_POST['username'] = trim($_POST['username']);
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|regex_match[/^[a-z0-9]+$/]', array( 'is_unique'	=> 'Username sudah  digunakan.', 'regex_match' => 'Username tidak boleh terdapat spasi didalamnya')
			);
			if( $this->form_validation->run() == false) {
				# back to login
				$this->session->set_flashdata('status', 'danger');
				$this->session->set_flashdata('message', validation_errors());
				redirect(site_url('kandidat/pengaturan/dasar'), 'refresh');
			}
			$is_change_username = true;
		}

		//Update
		$success = $this->peserta_model->update_peserta($idpeserta, $this->input->post());

		if($success) {
			if($is_change_username){
				$_SESSION['username'] = $_POST['username'];
				$this->auth_model->update_username($this->session->userdata('email'), $_POST['username']);
			}
			if($_POST['provinsi'] != $ext_data['provinsi']) {
				// Update Jumlah Provinsi
				$this->provinsi_model->update_jumlah('nama_provinsi', $ext_data['provinsi'], false);
				$this->provinsi_model->update_jumlah('nama_provinsi', $_POST['provinsi']);
			}
			if($_POST['agama'] != $ext_data['agama']) {
				// Update Jumlah Provinsi
				$this->agama_model->update_jumlah('agama', $ext_data['agama'], false);
				$this->agama_model->update_jumlah('agama', $_POST['agama']);
			}
			if($_POST['institusi'] != $ext_data['institusi']) {
				// Update jumlah institusi
				$this->institusi_model->update_jumlah('nama_institusi', $ext_data['provinsi'], false);
				$exist = $this->institusi_model->is_exist('nama_institusi', $_POST['institusi']);
				if($exist)
					$this->institusi_model->update_jumlah('nama_institusi', $_POST['institusi']);
				else 
					$this->institusi_model->insert_institusi($_POST['institusi'], 1);
			}
			if($_POST['username'] != $ext_data['username']) {
				//Update username
				$this->auth_model->update_username($this->session->userdata('email'), $_POST['username']);
			}
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Data anda berhasil disimpan');
		} else if($status == 'insert') {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Ada kesalahan ketika meyimpan data anda,'.$success);
		} else {
			$success = "Perintah tidak dikenali";
		}

		redirect(site_url('kandidat/pengaturan/dasar'), 'refresh');
		
	}

	public function do_update_rekomendasi($status='update'){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('peserta_model');
		$this->load->model('perekomendasi_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));

		if($_FILES['file_rekomendasi_path']['name'] != ''){
			if($this->do_check_document('file_rekomendasi_path')){
				$file = explode('.',$_FILES['file_rekomendasi_path']['name']);
				$extension_file = end($file);
				$filename = MD5('document_'.$this->session->userdata('username')).'.'.strtolower($extension_file);
				// Upload document
				$this->do_upload_document('file_rekomendasi_path', $filename);
				$_POST['file_rekomendasi_path'] = $filename;
			} else {
				redirect(site_url('kandidat/pengaturan/rekomendasi'), 'refresh');
			}
		} else {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'Terjadi kesalah ketika mengupload file ini');
			redirect(site_url('kandidat/pengaturan/rekomendasi'), 'refresh');
		}

		if($status == 'update') {
			$success = $this->perekomendasi_model->update_perekomendasi($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['peserta_id'] = $idpeserta;
			$_POST['is_ready'] = 1;
			$success = $this->perekomendasi_model->insert_perekomendasi($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
		}
		redirect(site_url('kandidat/pengaturan/rekomendasi'), 'refresh');
	}

	public function do_update_essay($status='update'){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('peserta_model');
		$this->load->model('essay_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->essay_model->update_essay($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['peserta_id'] = $idpeserta;
			$_POST['is_ready'] = 1;
			$success = $this->essay_model->insert_essay($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
		}

		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/essay'), 'refresh');

	}

	public function do_update_project($status='update'){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('peserta_model');
		$this->load->model('project_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->project_model->update_project($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['peserta_id'] = $idpeserta;
			$_POST['is_ready'] = 1;
			$success = $this->project_model->insert_project($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}

		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/project'));

	}

	public function do_update_pencapaian($status='update'){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->pencapaian_model->update_pencapaian($idpeserta, $this->input->post('indeks'), $this->input->post());
		} else if ($status == 'insert'){
			$_POST['peserta_id'] = $idpeserta;
			$_POST['is_ready'] = 1;
			$success = $this->pencapaian_model->insert_pencapaian($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/pencapaian'));
	}

	public function do_update_komitmen(){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('peserta_model');
		$this->load->model('komitmen_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		$_POST['peserta_id'] = $idpeserta;
		
		$arr_penempatan = $_POST['penempatan'];
		$_POST['penempatan'] = implode(',', $arr_penempatan);

		$success = $this->komitmen_model->insert_komitmen($this->input->post());
		if($success){
			$this->peserta_model->completed_data($idpeserta);
			if($this->input->post('pilihan') == 'pusat'){
				$this->load->model('pusat_model');
				foreach ($arr_penempatan as $info) {
					$this->pusat_model->update_jumlah($info);
				}
			} else {
				$this->load->model('regional_model');
				foreach ($arr_penempatan as $info) {
					$this->regional_model->update_jumlah($info);
				}
			}
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/komitmen'));
	}

	public function do_update_akun(){

		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('status', 'Session anda sudah berakhir, silahkan login kembali');
			redirect(site_url('auth'));
		}

		$this->load->model('auth_model');
		$this->load->model('peserta_model');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[new_password]', array('matches' => 'Password dan Konfirmasi Password yang anda masukkan tidak sama'));

		if( $this->form_validation->run() == false) {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect(site_url('kandidat/pengaturan/akun'), 'refresh');
		}

		$pass = $this->auth_model->get_old_password($this->session->userdata('email'));
		$old_pass = MD5($this->input->post('password'));

		if($old_pass != $pass) {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', 'password lama yang anda masukkan tidak sesuai');
			redirect(site_url('kandidat/pengaturan/akun'), 'refresh');
		}

		$new_pass = MD5($this->input->post('new_password'));
		$success = $this->auth_model->update_password($this->session->userdata('email'), $new_pass);
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/akun'));
	}

	public function get_pencapaian(){
		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		$pencapaian = $this->pencapaian_model->read_pencapaian($idpeserta, $this->input->post('indeks'))->result();
		// $pencapaian = $this->pencapaian_model->read_pencapaian($idpeserta, $indeks)->result_array();
		echo json_encode($pencapaian[0]);
	}

	public function get_all_province(){
		$this->load->model('provinsi_model');
		$data = $this->provinsi_model->read_all_provinsi()->result_array();

		echo json_encode($data);
	}

	public function get_pusat_kegiatan(){
		$this->load->model('pusat_model');
		$data = $this->pusat_model->read_all_pusat()->result_array();

		echo json_encode($data);
	}

	public function get_regional_kegiatan(){
		$this->load->model('regional_model');
		$data = $this->regional_model->read_all_regional()->result_array();

		echo json_encode($data);
	}

	public function do_upload_profpic($userfile, $filename){
		$this->load->library('upload');

		$config1['upload_path'] 		= 'profpics_upload';
		$config1['allowed_types'] 	= 'jpg|jpeg|png';
		$config1['max_size']				= '2048';
		$config1['file_name']				= $filename;
		$config1['overwrite'] 			= TRUE;

		$this->upload->initialize($config1);
		
		if(strlen($_FILES[$userfile]['name']) > 0) {
			if(!$this->upload->do_upload($userfile)) { 
				$upload_errors = $this->upload->display_errors('', '');
				$this->session->set_flashdata('message', 'Error: '.$upload_errors);
				$this->session->set_flashdata('status', 'danger');
				redirect(site_url('kandidat/pengaturan/dasar'));
			} else {

				// // THUMB IMAGE
				// $config2['image_library'] = 'gd2';
				// $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				// $config2['new_image'] = 'profpics_upload/thumbs';
				// $config2['maintain_ratio'] = TRUE;
				// $config2['create_thumb'] = TRUE;
				// $condig2['thumb_marker'] = '_thumb';
				// $config2['width'] = 215;
				// $config2['height'] = 215;
				// $config2['overwrite'] = TRUE;
				// $this->load->library('image_lib', $config2);

				// if(!$this->image_lib->resize()) {
    //     	$this->session->set_flashdata('status', 'danger');
				// 	$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
				// 	return false;
				// }

				 // MAIN IMAGE
        $config3['image_library'] = 'gd2';
        $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config3['maintain_ratio'] = TRUE;
        $config3['width'] = 512;
        $config3['height'] = 512;
        $config3['overwrite'] = TRUE;
        $this->load->library('image_lib',$config3);
        if (!$this->image_lib->resize()){
        	$this->session->set_flashdata('status', 'danger');
        	$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
        	redirect('kandidat/pengaturan/dasar');
        }
			}
			return true;
		}
	}

	public function do_upload_document($userfile, $filename){
		$config['upload_path'] 		= "documents_upload";
		$config['allowed_types']	= "pdf";
		$config2['max_size']			= '2048';
		$config['file_name']			= $filename;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($userfile)){
			$this->session->set_flashdata('status', 'danger');
    	$this->session->set_flashdata('message', $this->upload->display_errors());
    	redirect('kandidat/pengaturan/rekomendasi');
		}

		return true;
	}

	public function do_upload_ktp($userfile, $filename){
		$this->load->library('upload');

		$config2['upload_path'] 		= 'ktp_upload';
		$config2['allowed_types'] 	= 'jpg|jpeg|png';
		$config2['max_size']				= '2048';
		$config2['file_name']				= $filename;
		$config2['overwrite'] 			= TRUE;

		$this->upload->initialize($config2);

		if(strlen($_FILES[$userfile]['name']) > 0) {
			if(!$this->upload->do_upload($userfile)){
				$upload_errors = $this->upload->display_errors('', '');
				$this->session->set_flashdata('message', 'Error: '.$upload_errors);
				$this->session->set_flashdata('status', 'danger');
				redirect(site_url('kandidat/pengaturan/dasar'));
			}
		}
		return true;
	}

	public function do_check_image($userfile, $filename) {
		try {
			if($_FILES[$userfile]['error']) {
				switch ($_FILES[$userfile]['error']) {
	        case UPLOAD_ERR_OK:
	        	break;
	        case UPLOAD_ERR_NO_FILE:
						throw new RuntimeException('Tidak terdeteksi gambar '.$filename.' yang terkirim.');
	        case UPLOAD_ERR_INI_SIZE:
	        case UPLOAD_ERR_FORM_SIZE:
	        	throw new RuntimeException('Ukuran gambar '.$filename.' yang diupload terlalu besar.');
	        default:
	        throw new RuntimeException('Terdapat error ketika mengupload gambar '.$filename.', coba upload dengan gambar yang lain.');
		    }
			}
			$finfo = new finfo(FILEINFO_MIME_TYPE);
	    if (false === $ext = array_search(
	        $finfo->file($_FILES[$userfile]['tmp_name']),
	        array(
	        	'jpg' => 'image/jpeg',
	        	'png' => 'image/png',
	        	'gif' => 'image/gif',
	        ),
	        true
	    )){
        throw new RuntimeException('Format gambar yang diupload salah.');
	    }
		} catch (RuntimeException $e) {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', $e->getMessage());
			return false;
		}
		return true;
	}

	public function do_check_document($userfile) {
		try {
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if($_FILES[$userfile]['error']) {
				switch ($_FILES[$userfile]['error']) {
	        case UPLOAD_ERR_OK:
	        	break;
	        case UPLOAD_ERR_NO_FILE:
						throw new RuntimeException('Tidak terdeteksi file yang diupload.');
	        case UPLOAD_ERR_INI_SIZE:
	        case UPLOAD_ERR_FORM_SIZE:
	        	throw new RuntimeException('Ukuran file rekomendasi yang diupload terlalu besar.');
	        default:
	        throw new RuntimeException('Terdapat error ketika mengupload file rekomendasi.');
		    }
			}
			if($finfo->file($_FILES[$userfile]['tmp_name']) != 'application/pdf') {
        throw new RuntimeException('Format gambar yang diupload salah.');
			}
		} catch (RuntimeException $e) {
			$this->session->set_flashdata('status', 'danger');
			$this->session->set_flashdata('message', $e->getMessage());
			return false;
		}
		return true;
	}

	public function alert_messages($success) {
		if($success == true) {
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Data anda berhasil disimpan');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Ada kesalahan ketika meyimpan data anda,'.$success);
		}
	}
}