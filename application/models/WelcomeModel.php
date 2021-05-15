<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_pobox() {
		$this->db->select('*');
		$this->db->from('pobox');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_byid_pobox($pobox_id) {
		$this->db->select('*');
		$this->db->from('pobox');
		$this->db->where('pobox_id', $pobox_id);
		$query = $this->db->get();
		return $query->row();
	}
}