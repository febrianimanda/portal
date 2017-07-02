<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function index() {

	}

	public function profil() {
		$data['title'] = 'Profil Kandidat';
		$data['content'] = $this->load->view('kandidat/profil', '', true);
		$this->load->view('template/profil-full', $data);
	}

	public function pengaturan($page='') {
		if(!isset($page) or $page=='') {
			$page = 'dasar';
		}

		$data['title'] = "Pengaturan ".$page;

		// echo "<script>alert('".$page."')</script>";

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