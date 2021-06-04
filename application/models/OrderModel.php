<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_transaction() {
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->order_by('transaction_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_byid_transaction($transaction_id) {
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('transaction_id', $transaction_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_byid_user($user_id) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update($data) {
		$this->db->where('transaction_id',$data['transaction_id']);
		unset($data['transaction_id']);
		$quesry = $this->db->update('transaction', $data);
		return $quesry;
	}

	public function update_pobox($data) {
		$this->db->where('pobox_id',$data['pobox_id']);
		unset($data['pobox_id']);
		$quesry = $this->db->update('pobox', $data);
		return $quesry;
	}
}