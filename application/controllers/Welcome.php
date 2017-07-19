<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index(){
		$this->load->view('coming-soon');
	}

	public function home(){
		// Setup page content
		$data['title'] = 'Profil Kandidat';
		$data['content'] = $this->load->view('home', '', true);

		$this->load->view('template/full-template', $data);
	}

}