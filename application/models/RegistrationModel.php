<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_user() {
		$this->db->select('user_id, user_email, user_password, user_status, user_type');
		$this->db->from('user');
		$this->db->order_by('user_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function generate_user_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(user_id,2)) AS id_max FROM user");
		$id = "";
		if($query->num_rows() > 0){
			foreach($query->result() as $kd){
                $tmp = ((int)$kd->id_max)+1;
                $id = sprintf("%05s", $tmp);
            }
		}else{
			$id = "00001";
		}

		$char = "USR";
		return $char.$id;
	}

	public function get_byid_user($user_id) {
		$this->db->select('user_id, user_email, user_password, user_status, user_type');
		$this->db->from('user');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
		$quesry = $this->db->insert('user', $data);
		return $quesry;
	}

	public function update($data) {
		$this->db->where('user_id',$data['user_id']);
        unset($data['user_id']);
        return $this->db->update('user',$data);
	}

	public function delete($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->delete('user');
		return $this->db->affected_rows();
	}
}