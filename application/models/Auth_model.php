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

	public function insert_token($email) {
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token'					=> $token,
			'user_email'		=> $email,
			'date_created'	=> $date
		);

		$this->db->insert('tokens', $string);
		return $tokens . $email;
	}

	public function is_token_valid($token) {
		$tkn = substr($token, 0, 30);
		$uemail = substr($token, 30);

		$q = $this->db->get_where('tokens', array(
			'tokens.token'			=> $tkn,
			'tokens.user_email'	=> $uemail,
		), 1);

		if($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->date_created;
			$today = date('Y-m-d');
			if(strtotime($created) != strtotime($today)){
				return false;
			}

			$user_info = $this->read_user_information($row->email);
			return $user_info;
		}
		return false;
	}

	public function update_password($post) {
		$query1 = $this->db->where('email', $post['email']);
		$query1->update('user', array('password'=>$post['password']));
		if($query1->affected_rows() > 0){
			$query2->where('email', $post['email']);
			$query2->update('token', array('is_expired'=>true));
			return true;
		}
		return false;
	}

}

?>