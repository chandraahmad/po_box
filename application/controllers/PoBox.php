<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoBox extends CI_Controller {
    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('PoBoxModel');
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "pobox.js";
		$data['GetAllPoBox'] = $this->PoBoxModel->get_all_pobox();
        $data['GetAllOffice'] = $this->PoBoxModel->get_all_office();
		$this->load->view('layouts/header.php');
		$this->load->view('pobox/pobox_index', $data);
		$this->load->view('layouts/footer.php', $data);
	}

	public function insert() {
		$this->form_validation->set_rules('pobox_id', 'Po Box Number', 'trim|required');
        $this->form_validation->set_rules('pobox_office', 'Office', 'trim|required');
        $this->form_validation->set_rules('pobox_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('pobox_price', 'Price', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'pobox_id' => $this->input->post('pobox_id'),
                'pobox_office' => $this->input->post('pobox_office'),
                'pobox_price' => $this->input->post('pobox_price'),
                'pobox_status' => $this->input->post('pobox_status'),
                'pobox_status_sale' => '0'
			);
			
			$result = $this->PoBoxModel->insert($data);
			if ($result == TRUE) {
				$out['status'] = 'true';
				$out['msg_header'] = 'Well done';
				$out['msg'] = 'Data saved successfully';
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Failed';
				$out['msg'] = 'Connection lost';
			}
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
		}
		echo json_encode($out);
	}

	public function update() {
		$this->form_validation->set_rules('pobox_id', 'Po Box Number', 'trim|required');
        $this->form_validation->set_rules('pobox_office', 'Office', 'trim|required');
        $this->form_validation->set_rules('pobox_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('pobox_price', 'Price', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'pobox_id' => $this->input->post('pobox_id'),
                'pobox_office' => $this->input->post('pobox_office'),
                'pobox_price' => $this->input->post('pobox_price'),
                'pobox_status' => $this->input->post('pobox_status')
			);
			
			$result = $this->PoBoxModel->update($data);
			if ($result == TRUE) {
				$out['status'] = 'true';
				$out['msg_header'] = 'Well done';
				$out['msg'] = 'Data saved successfully';
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Failed';
				$out['msg'] = 'Connection lost';
			}
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
		}
		echo json_encode($out);
	}

	public function getbyidpobox() {
		
		$id = $_GET['id'];
		$data['GetByIdPoBox'] = $this->PoBoxModel->get_byid_pobox($id);
        $data['GetAllOffice'] = $this->PoBoxModel->get_all_office();

		$this->load->view('pobox/pobox_update', $data);
	}

	public function delete() {
		
		$id = $_GET['id'];
		$result = $this->PoBoxModel->delete($id);
		if ($result == TRUE) {
			$out['status'] = 'true';
			$out['msg_header'] = 'Well done';
			$out['msg'] = 'Data has been deleted';
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Failed';
			$out['msg'] = 'Connection lost';
		}
		echo json_encode($out);
	}
}