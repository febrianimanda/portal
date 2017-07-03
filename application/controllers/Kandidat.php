<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function index() {
		#same as profil page

		$this->profil($this->session->userdata('username'));
	}

	public function profil($username) {
		// Load Model
		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');
		$this->load->model('project_model');
		$this->load->model('essay_model');
		$this->load->model('perekomendasi_model');

		// setup page variable, result array is faster than else
		$data_page['dasar'] = $this->peserta_model->read_peserta_by_username($username)->result_array();
		$idpeserta = $data_page['dasar'][0]['id_peserta'];
		$data_page['pencapaian'] = $this->pencapaian_model->read_all_pencapaian($idpeserta)->result_array();
		$data_page['project'] = $this->project_model->read_project($idpeserta)->result_array();
		$data_page['essay'] = $this->essay_model->read_essay($idpeserta)->result_array();
		$data_page['rekomendasi'] = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
		$data_page['is_me'] = ($this->session->userdata('username') == $username);
		
		$tw = $data_page['dasar'][0]['twitter'];
		$ig = $data_page['dasar'][0]['instagram'];

		$data['socmed'] = array(
			'fb' 			=> $data_page['dasar'][0]['fb'],
			'twitter'	=> (strpos($tw,'twitter.com/')) ? $tw : "twitter.com/".$tw,
			'ig'			=> (strpos($ig,'instagram.com/')) ? $ig : "instagram.com/".$ig,
			'blog'		=> $data_page['dasar'][0]['blog']
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

		$data['title'] = "Pengaturan ".$page;

		if($page == 'dasar') {
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

			// Setup Page Dynamic CSS and JS
			$data['header_css_file'] = ['bootstrap-tagsinput'];
			$data['header_css_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.css'];
			$data['footer_js_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.js'];
			$data['footer_js_file'] = ['bootstrap-tagsinput'];
		}

		if(!isset($data_page)){
			$data['content'] = $this->load->view('kandidat/f-'.$page, '', true);
		} else {
			$data['content'] = $this->load->view('kandidat/f-'.$page, $data_page, true);
		}

		$this->load->view('template/profil-full', $data);
	}

}