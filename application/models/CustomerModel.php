<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_customer() {
		$this->db->select('a.*, b.*');
		$this->db->from('customer a');
        $this->db->join('user b', 'a.customer_user_id = b.user_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function generate_customer_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(`customer_id`, 11)) AS max_id FROM `customer`");
		$last=$this->db->query("SELECT MAX(MID(`customer_id`, 4, 6)) AS last_data FROM `customer`")->row()->last_data;
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
		$char = "CSR".$current;
		return $char.$id;
	}

	public function get_byid_customer($customer_id) {
		$this->db->select('a.*, b.*');
		$this->db->from('customer a');
        $this->db->join('user b', 'a.customer_user_id = b.user_id');
		$this->db->where('a.customer_id', $customer_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
		$quesry = $this->db->insert('customer', $data);
		return $quesry;
	}

	public function update($data) {
		$this->db->where('customer_id',$data['customer_id']);
		unset($data['customer_id']);
		$quesry = $this->db->update('customer', $data);
		return $quesry;
	}

	public function delete($customer_id) {
		$this->db->where('customer_id', $customer_id);
		$this->db->delete('customer');
		return $this->db->affected_rows();
	}
}