<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function index() {
		#same as profil page
		if($this->session->userdata('logged_in')){
			$this->profil($this->session->userdata('username'));
		} else {
			redirect(site_url(), 'refresh');
		}
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
		$idpeserta = $data_page['dasar'][0]['peserta_id'];
		$data_page['pencapaian'] = $this->pencapaian_model->read_all_pencapaian($idpeserta)->result_array();
		$data_page['project'] = $this->project_model->read_project($idpeserta)->result_array();
		$data_page['essay'] = $this->essay_model->read_essay($idpeserta)->result_array();
		$data_page['rekomendasi'] = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
		$data_page['is_me'] = ($this->session->userdata('username') == $username);


		$tw = $data_page['dasar'][0]['twitter'];
		$ig = $data_page['dasar'][0]['instagram'];

		//setup template page variable
		$data['socmed'] = array(
			'fb' 			=> $data_page['dasar'][0]['fb'],
			'twitter'	=> (strpos($tw,'twitter.com/')) ? $tw : "twitter.com/".$tw,
			'ig'			=> (strpos($ig,'instagram.com/')) ? $ig : "instagram.com/".$ig,
			'blog'		=> $data_page['dasar'][0]['blog']
		);

		$profpic = $data_page['dasar'][0]['profpic_path'];
		$data['header_info'] = array(
			'name' 			=> $data_page['dasar'][0]['fullname'],
			'kota'			=> $data_page['dasar'][0]['kota'],
			'provinsi'	=> $data_page['dasar'][0]['provinsi'],
			'profpic'		=> ($profpic != '') ? $profpic : 'ava-'.$data_page['dasar'][0]['gender'].'.png'
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
		
		$this->load->model('peserta_model');
		$username = $this->session->userdata('username');
		$idpeserta = $this->peserta_model->get_id('username', $username);

		if($page == 'dasar') {
			// Load Model
			$this->load->model('agama_model');
			$this->load->model('jalur_model');
			$this->load->model('provinsi_model');
			$this->load->model('info_model');

			// setup page variable
			$data_page['data'] = $this->peserta_model->read_peserta_by_username($username)->result_array()[0];
			$data_page['agama'] = $this->agama_model->read_all_agama()->result_array();
			$data_page['jalur'] = $this->jalur_model->read_all_jalur()->result_array();
			$data_page['provinsi'] = $this->provinsi_model->read_all_provinsi()->result_array();
			$data_page['info'] = $this->info_model->read_all_info()->result_array();

			// Setup Page Dynamic CSS and JS
			$data['header_css_file'] = ['bootstrap-tagsinput'];
			$data['header_css_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.css'];
			$data['footer_js_url'] = ['https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.js'];
			$data['footer_js_file'] = ['bootstrap-tagsinput'];

		} else if ($page == 'rekomendasi') {
			// Load model
			$this->load->model('perekomendasi_model');

			$obj_rekomendasi = $this->perekomendasi_model->read_perekomendasi($idpeserta)->result_array();
			$exist = (sizeof($obj_rekomendasi) > 0);

			$data_page['data'] = array(
				'nama_perekomendasi' 		=> ($exist) ? $obj_rekomendasi[0]['nama_perekomendasi'] : "",
				'file_rekomendasi_path' => ($exist) ? $obj_rekomendasi[0]['file_rekomendasi_path'] : "",
				'status' 								=> ($exist) ? "update" : "new",
			);

		} else if ($page == 'essay') {
			//load model
			$this->load->model('essay_model');

			$obj_essay = $this->essay_model->read_essay($idpeserta)->result_array();
			$exist = (sizeof($obj_essay) > 0);

			$data_page['data'] = array(
				'konten'	=> ($exist) ? $obj_essay[0]['konten'] : "",
				'status' 	=> ($exist) ? "update" : "new",
			);

		} else if ($page == 'project') {
			//load Model
			$this->load->model('project_model');

			$obj_project = $this->project_model->read_project($idpeserta)->result_array();
			$exist = (sizeof($obj_project) > 0);
			$obj_field = array('nama_project', 'penanggung_jawab', 'peran', 'jenis', 'lokasi', 'alasan_penting', 'kegiatan', 'supported_fim');

			foreach ($obj_field as $field) {
				if($exist)
					$data_page['data'][$field] = $obj_project[0][$field];
				else
					$data_page['data'][$field] = "";
			}
			$data_page['data']['status'] = ($exist) ? "update" : "new";
		} else if($page == 'pencapaian') {
			// load model
			$this->load->model('pencapaian_model');
			$query_pencapaian = $this->pencapaian_model->read_all_pencapaian($idpeserta);
			$data_page['data_count'] = $query_pencapaian->num_rows();
			if($query_pencapaian->num_rows() > 0){
				$data_page['pencapaian'] = $query_pencapaian->result_array();
			}
		} else {
			// 404 page
		}

		if(!isset($data_page)){
			$data['content'] = $this->load->view('kandidat/f-'.$page, '', true);
		} else {
			$data['content'] = $this->load->view('kandidat/f-'.$page, $data_page, true);
		}

		$data['title'] = "Pengaturan ".$page;
		$header_info = $this->peserta_model->get_header_info('username', $username);
		$data['header_info'] = array(
			'name' 			=> $header_info['fullname'],
			'kota'			=> $header_info['kota'],
			'provinsi'	=> $header_info['provinsi'],
			'profpic'		=> ($header_info['profpic_path'] != '') ? $header_info['profpic_path'] : 'ava-'.$header_info['gender'].'.png'
		);
		$this->load->view('template/profil-full', $data);
	}

	public function do_update_dasar(){
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
		if($_FILES['profpic_path']['size'] > 0){
			$img = explode('.',$_FILES['profpic_path']['name']);
			$extension_img = end($img);
			$profpic_filename = $username.'.'.$extension_img;
			// Upload image
			$this->do_upload_profpic('profpic_path', $profpic_filename);
			$_POST['profpic_path'] = $profpic_filename;
		}

		// upload KTP
		if($_FILES['ktp_path']['size'] > 0){
			$img = explode('.', $_FILES['ktp_path']['name']);
			$extension_img = end($img);
			$ktp_filename = MD5('ktp_'.$username).'.'.$extension_img;
			//uppload image
			$this->do_upload_ktp('ktp_path', $ktp_filename);
			$_POST['ktp_path'] = $ktp_filename;
		}

		$success = $this->peserta_model->update_peserta($idpeserta, $this->input->post());
		if($success) {
			if($_POST['provinsi'] != $ext_data['provinsi']) {
				// Update Jumlah Provinsi
				$this->provinsi_model->update_jumlah('nama_provinsi', $ext_data['provinsi'], false);
				$this->provinsi_model->update_jumlah('nama_provinsi', $_POST['provinsi']);
			}
			if($_POST['agama'] != $ext_data['agama']) {
				// Update Jumlah Provinsi
				$this->provinsi_model->update_jumlah('agama', $ext_data['agama'], false);
				$this->provinsi_model->update_jumlah('agama', $_POST['agama']);
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
			echo "Something is wrong";
		}
		redirect(site_url('kandidat/pengaturan/dasar'), 'refresh');
	}

	public function do_update_rekomendasi($status='update'){
		$this->load->model('peserta_model');
		$this->load->model('perekomendasi_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		
		if($_FILES['file_rekomendasi_path']['size'] > 0){
			$file = explode('.',$_FILES['file_rekomendasi_path']['name']);
			$extension_file = end($file);
			$filename = MD5('document_'.$this->session->userdata('username')).'.'.$extension_file;
			// Upload document
			$this->do_upload_document('file_rekomendasi_path', $filename);
			$_POST['file_rekomendasi_path'] = $filename;
		}

		if($status == 'update') {
			$success = $this->perekomendasi_model->update_perekomendasi($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['id_peserta'] = $idpeserta;
			$success = $this->perekomendasi_model->insert_perekomendasi($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/rekomendasi'), 'refresh');
	}

	public function do_update_essay($status='update'){
		$this->load->model('peserta_model');
		$this->load->model('essay_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->essay_model->update_essay($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['peserta_id'] = $idpeserta;
			$success = $this->essay_model->insert_essay($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/essay'), 'refresh');
	}

	public function do_update_project($status='update'){
		$this->load->model('peserta_model');
		$this->load->model('project_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->project_model->update_project($idpeserta, $this->input->post());
		} else if ($status == 'insert') {
			$_POST['peserta_id'] = $idpeserta;
			$success = $this->project_model->insert_project($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/project'));
	}

	public function do_update_pencapaian($status='update'){
		$this->load->model('peserta_model');
		$this->load->model('pencapaian_model');

		$idpeserta = $this->peserta_model->get_id('username', $this->session->userdata('username'));
		if($status == 'update') {
			$success = $this->pencapaian_model->update_pencapaian($idpeserta, $this->input->post('indeks'), $this->input->post());
		} else if ($status == 'insert'){
			$_POST['peserta_id'] = $idpeserta;
			$success = $this->pencapaian_model->insert_pencapaian($this->input->post());
		} else {
			$success = "Perintah tidak dikenali";
			echo "Something is wrong";
		}
		$this->alert_messages($success);
		redirect(site_url('kandidat/pengaturan/pencapaian'));
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

	public function do_upload_profpic($userfile, $filename){

		$config['upload_path'] 		= 'profpics_upload';
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$config['max_size']				= '100000';
		$config['file_name']			= $filename;
		$config['overwrite'] 		= TRUE;
		$this->load->library('upload', $config);
		
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
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 512;
        $config['height'] = 512;
        $config['overwrite'] = TRUE;
        $this->load->library('image_lib',$config);

        if (!$this->image_lib->resize()){
        	$this->session->set_flashdata('status', 'danger');
        	$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
        	return false;
        }
			}
			return true;
		}
	}

	public function do_upload_document($userfile, $filename){
		$config['upload_path'] 		= "documents_upload";
		$config['allowed_types']	= "pdf";
		$config['file_name']				= $filename;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($userfile)){
			$this->session->set_flashdata('status', 'danger');
    	$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
		}

		return true;
	}

	public function do_upload_ktp($userfile, $filename){
		$config['upload_path'] 		= 'ktp_upload';
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$config['max_size']				= '100000';
		$config['file_name']			= $filename;
		$config['overwrite'] 			= TRUE;

		$this->load->library('upload', $config);
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