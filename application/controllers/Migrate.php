<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function index() {
		
		if(ENVIRONMENT== 'development') {
			$this->load->library('migration');
			if($this->migration->current() === FALSE) {
				show_error($this->migration->error_string());
			} else {
				$this->load->view('template/header');
				$this->load->view('success',array('job'=>'Migrasi'));
				$this->load->view('template/footer');
			}
		} else {
			redirect('/not_found','refresh');
		}

	}

}
?>