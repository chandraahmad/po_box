<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotpasswordModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_byid_user($user_id) {
		$this->db->select('user_id, user_name, user_email, user_password, user_status, user_type, user_created');
		$this->db->from('user');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->row();
	}

    public function get_byemail_user($user_email) {
		$this->db->select('user_id, user_name, user_email, user_password, user_status, user_type, user_created');
		$this->db->from('user');
		$this->db->where('user_email', $user_email);
		$query = $this->db->get();
		return $query->row();
	}

	public function update($data) {
		$this->db->where('user_id',$data['user_id']);
        unset($data['user_id']);
        return $this->db->update('user',$data);
	}
}