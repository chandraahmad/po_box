<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PoBoxModel extends CI_Model {

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

    public function generate_pobox_id() {
		$query=$this->db->query("SELECT MAX(RIGHT(pobox_id,2)) AS id_max FROM pobox");
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

	public function get_byid_pobox($pobox_id) {
		$this->db->select('*');
		$this->db->from('pobox');
		$this->db->where('pobox_id', $pobox_id);
		$query = $this->db->get();
		return $query->row();
	}

    public function get_byid_office($office_id) {
		$this->db->select('a.*');
		$this->db->from('office a');
		$this->db->where('a.office_id', $office_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
		$quesry = $this->db->insert('pobox', $data);
		return $quesry;
	}

	public function update($data) {
		$this->db->where('pobox_id',$data['pobox_id']);
		unset($data['pobox_id']);
		$quesry = $this->db->update('pobox', $data);
		return $quesry;
	}

	public function delete($pobox_id) {
		$this->db->where('pobox_id', $pobox_id);
		$this->db->delete('pobox');
		return $this->db->affected_rows();
	}
}