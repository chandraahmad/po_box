<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionModel extends CI_Model {

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
		$this->db->select('a.*, b.*');
		$this->db->from('pobox a');
		$this->db->join('office b', 'a.pobox_office = b.office_id');
		$this->db->where('a.pobox_id', $pobox_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_byid_transaction($param, $transaction_pobox) {
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where($param, $transaction_pobox);
		$this->db->order_by('transaction_id', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_byid_customer($customer_user_id) {
        $this->db->select('*');
		$this->db->from('customer');
		$this->db->where('customer_user_id', $customer_user_id);
		$query = $this->db->get();        
		return $query->row();
	}

	public function get_bypobox_shipment($shipment_pobox) {
        $this->db->select('*');
		$this->db->from('shipment');
		$this->db->where('shipment_pobox', $shipment_pobox);
		$this->db->where('shipment_status', '0');
		$this->db->order_by('shipment_id', 'DESC');
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

	public function generate_transaction_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(`transaction_id`, 11)) AS max_id FROM `transaction`");
		$last=$this->db->query("SELECT MAX(MID(`transaction_id`, 4, 6)) AS last_data FROM `transaction`")->row()->last_data;
		$current = date('ymd');
		$id = "";
		if($query->num_rows() > 0 AND $last == $current){
			foreach($query->result() as $code){
                $tmp = ($code->max_id)+1;
                $id = substr($tmp, -5);
            }
		}else{
			$id = "00001";
		}
		$char = "TRX".$current;
		return $char.$id;
	}

	public function get_expired_po_box($transaction_pobox, $user_id) {
		$this->db->select('datediff(transaction_until_date, current_date()) As selisihDate, transaction_until_date');
		$this->db->from('transaction');
		$this->db->where('transaction_pobox', $transaction_pobox);
		$this->db->where('transaction_user', $user_id);
		$this->db->order_by('transaction_id', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
		$quesry = $this->db->insert('transaction', $data);
		return $quesry;
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

	public function update_shipment($data) {
		$this->db->where('shipment_status', '0');
		$this->db->where('shipment_pobox', $data['shipment_pobox']);
		unset($data['shipment_pobox']);
		$quesry = $this->db->update('shipment', $data);
		return $quesry;
	}
}