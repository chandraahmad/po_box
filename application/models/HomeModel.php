<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

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

	public function get_all_transaction() {
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->order_by('transaction_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_user() {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_type', '3');
		$this->db->where('user_status', '1');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_expired_po_box($transaction_pobox) {
		$this->db->select('datediff(transaction_until_date, current_date()) As selisihDate');
		$this->db->from('transaction');
		$this->db->where('transaction_pobox', $transaction_pobox);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_income() {
		$this->db->select('SUM(transaction_total_price) As income');
		$this->db->from('transaction');
		$this->db->where('transaction_until_date >', date('Y-m-d H:i:s'));
		$query = $this->db->get();
		return $query->row();
	}

	public function get_expenses() {
		$this->db->select('SUM(pobox_price) As expenses');
		$this->db->from('pobox');
		$this->db->where('pobox_status_sale', '0');
		$query = $this->db->get();
		return $query->row();
	}
}