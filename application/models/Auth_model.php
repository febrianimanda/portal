<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public function insert_registration($data) {
		$query = $this->db->insert('user', $data);
		return $query;
	}

	public function login_validation($data) {
		$limit = 1;
		$query = $this->db->get_where('user', $data);
		return ($query->num_rows() == 1) ? true : false;
	}

	public function read_user_information($email) {
		$query = $this->db->get_where('user', array('email'=>$email), 1);
		if($query->num_rows() == 1) {
			return $query->result();
		}
		return false;
	}

}

?>