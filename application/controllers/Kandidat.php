<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function index() {

	}

	public function profil() {
		$data['title'] = 'Kandidat';
		$data['content'] = $this->load->view('kandidat/profil', '', true);

		$this->load->view('template/full-template', $data);
	}

}