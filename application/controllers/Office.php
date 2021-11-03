<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {
    public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('user_email') != NULL) {
            $this->load->model('OfficeModel');	
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "office.js";
        $data['GetAllOffice'] = $this->OfficeModel->get_all_office();
        $this->load->view('layouts/header.php');
        $this->load->view('office/office_index', $data);
        $this->load->view('layouts/footer.php', $data);
	}

	public function insert() {
		$this->form_validation->set_rules('office_name', 'Office Name', 'trim|required');
        $this->form_validation->set_rules('office_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('office_status', 'Status', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'office_id' => $this->OfficeModel->generate_office_id(),
                'office_name' => $this->input->post('office_name'),
                'office_address' => $this->input->post('office_address'),
                'office_regional' => $this->input->post('office_regional'),
                'office_status' => $this->input->post('office_status'),
			);
			
			$result = $this->OfficeModel->insert($data);
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
		$this->form_validation->set_rules('office_name', 'Office Name', 'trim|required');
        $this->form_validation->set_rules('office_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('office_status', 'Status', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'office_id' => $this->input->post('office_id'),
                'office_name' => $this->input->post('office_name'),
                'office_address' => $this->input->post('office_address'),
                'office_regional' => $this->input->post('office_regional'),
                'office_status' => $this->input->post('office_status'),
			);
			
			$result = $this->OfficeModel->update($data);
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

	public function getbyidoffice() {
		
		$id = $_GET['id'];
        $data['GetByIdOffice'] = $this->OfficeModel->get_byid_office($id);
        $data['GetAllRegional'] = $this->OfficeModel->get_all_regional();

		$this->load->view('office/office_update', $data);
	}

	public function delete() {
		
		$id = $_GET['id'];
		$result = $this->OfficeModel->delete($id);
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

    public function getregional() {
        $data['id'] = $_GET['id'];
		$data['GetAllRegional'] = $this->OfficeModel->get_all_regional();

        $this->load->view('office/office_regional', $data);
    }
}