<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SortModel extends CI_Model {

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

    public function get_all_office() {
		$this->db->select('a.*');
		$this->db->from('office a');
		$query = $this->db->get();
		return $query->result();
	}

	public function generate_shipment_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(shipment_id,2)) AS id_max FROM shipment");
		$id = "";
		if($query->num_rows() > 0){
			foreach($query->result() as $kd){
                $tmp = ((int)$kd->id_max)+1;
                $id = sprintf("%05s", $tmp);
            }
		}else{
			$id = "00001";
		}

		$char = "SHP";
		return $char.$id;
	}

	public function get_byid_pobox($pobox_id) {
		$this->db->select('*');
		$this->db->from('pobox');
		$this->db->where('pobox_id', $pobox_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all_byid_shipment($shipment_pobox) {
		$this->db->select('*');
		$this->db->from('shipment');
		$this->db->where('shipment_pobox', $shipment_pobox);
		$query = $this->db->get();
		return $query->result();
	}

	public function insert($data) {
		$quesry = $this->db->insert('shipment', $data);
		return $quesry;
	}

	public function delete($shipment_id) {
		$this->db->where('shipment_id', $shipment_id);
		$this->db->delete('shipment');
		return $this->db->affected_rows();
	}
}