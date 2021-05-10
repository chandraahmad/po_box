<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function login($data) {
		$this->db->select('user_id, user_name, user_email, user_password, user_status, user_type');
		$this->db->from('user');
		$this->db->where('user_email', $data['user_email']);
		$this->db->where('user_password', $data['user_password']);
		$query = $this->db->get();
		return $query->row();
	}
}