<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public function insert_registration($data) {
		$res = $this->db->insert('user', $data);
		return $res;
	}

}

?>