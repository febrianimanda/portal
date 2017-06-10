<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function index() {
		
		if(ENVIRONMENT== 'development') {
			$this->load->library('migration');
			if($this->migration->current() === FALSE) {
				show_error($this->migration->error_string());
			} else {
				$data['job'] = 'Migrasi';
				$data['title'] = 'Migration';
				$data['content'] = $this->load->view('success');
				$this->load->view('template/full-template',$data);
			}
		} else {
			redirect('/not_found','refresh');
		}

	}

}
?>