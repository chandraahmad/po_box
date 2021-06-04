<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_shipment() {
		$this->db->select('*');
		$this->db->from('shipment');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_byofficer_shipment($shipment_officer) {
		$this->db->select('*');
		$this->db->from('shipment');
		$this->db->where('shipment_officer', $shipment_officer);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_byid_user($user_id) {
		$this->db->select('*');
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
		$quesry = $this->db->update('user', $data);
		return $quesry;
	}

	public function delete($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->delete('user');
		return $this->db->affected_rows();
	}
}