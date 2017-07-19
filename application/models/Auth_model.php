<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public $table = 'user';

	public function insert_registration($data) {
		$query = $this->db->insert($this->table, $data);
		return $query;
	}

	public function login_validation($data) {
		$limit = 1;
		$query = $this->db->get_where($this->table, $data);
		return ($query->num_rows() == 1) ? true : false;
	}
	
	public function read_user_information($email) {
		$query = $this->db->get_where($this->table, array('email'=>$email), 1);
		if($query->num_rows() == 1) {
			return $query;
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

	public function update_password($email, $pass, $forgot = false ) {
		$query1 = $this->db->where('email', $email);
		$query1->update($this->table, array('password' => $pass));
		if($query1->affected_rows() > 0){
			if($forgot){
				$query2->where('email', $email);
				$query2->update('token', array('is_expired'=>true));
			}
			return true;
		}
		return false;
	}

	public function update_username($email, $new_username) {
		$this->db->where('email', $email);
		$this->db->update($this->table, array('username'=>$new_username));
		return $this->db->affected_rows();
	}

	public function get_old_password($email) {
		$this->db->select('password');
		$this->db->where('email', $email);
		return $this->db->get($this->table)->result_array()[0]['password'];
	}

	public function get_hash($email) {
		$this->db->select('hash');
		$this->db->where('email', $email);
		$result = $this->db->get($this->table)->result_array();
		return $result[0];
	}

	public function verify_user($email) {
		$data = array('is_verified' => 1);
		$this->db->where('email', $email);
		$this->db->update('user', $data);
		return ($this->db->affected_rows() > 0);
  }

  public function get_jalur($username) {
  	$this->db->select('jalur');
  	$this->db->where('username', $username);
  	$result = $this->db->get($this->table)->result_array();
  	return $result[0]['jalur'];
  }

}

?>