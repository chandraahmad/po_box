<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficeModel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function get_all_office() {
		$this->db->select('a.*');
		$this->db->from('office a');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_all_regional() {
        $this->db->select('a.*');
		$this->db->from('office a');
        $this->db->where('a.office_regional', '1');
		$query = $this->db->get();
		return $query->result();
    }

    public function generate_office_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(office_id,2)) AS id_max FROM office");
		$id = "";
		if($query->num_rows() > 0){
			foreach($query->result() as $kd){
                $tmp = ((int)$kd->id_max)+1;
                $id = sprintf("%05s", $tmp);
            }
		}else{
			$id = "00001";
		}

		$char = "OFC";
		return $char.$id;
	}

	public function get_byid_office($office_id) {
		$this->db->select('a.*');
		$this->db->from('office a');
		$this->db->where('a.office_id', $office_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
		$quesry = $this->db->insert('office', $data);
		return $quesry;
	}

	public function update($data) {
		$this->db->where('office_id',$data['office_id']);
		unset($data['office_id']);
		$quesry = $this->db->update('office', $data);
		return $quesry;
	}

	public function delete($office_id) {
		$this->db->where('office_id', $office_id);
		$this->db->delete('office');
		return $this->db->affected_rows();
	}
}