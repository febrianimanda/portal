<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->allowed()){
			$data['title'] = "List User";
			$data['content'] = $this->load->view('admin/dashboard', '', true);
			$this->load->view('template/dashboard-template', $data);
		}
	}

	public function list($page = 'users') {
		if($page == 'users') {
			$this->load->view('admin/'.$page);
		}
	}

	public function form($page = 'rekruter') {
		if($page == 'rekruter') {
			$this->load->view($page.'/form');
		}
	}

	public function allowed() {
		if($this->session->userdata('role') != 3) {
			redirect(site_url('404'), 'refresh');
		}
		return true;
	}

	public function user_list() {
		$this->load->model('admin_model');

		$list = $this->admin_model->get_datatable();
		$data = array();
		$no = $_POST['start'];
		foreach($list as $user) {
			$no++;
			$row = array(
				$no,
				$user['email'],
				$user['username'],
				$user['role'],
				$user['date_updated'],
				$user['user_id']
			);
			$data[] = $row;
		}

		$output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->admin_model->count_all(),
			'recordsFiltered' => $this->admin_model->count_filtered(),
			'data' => $data
		);

		echo json_encode($output);
	}
}
?>