<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('ReportModel');
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "report.js";
		if ($this->session->userdata('user_type') == '2') {
			$data['GetAllShipment'] = $this->ReportModel->get_byofficer_shipment($this->session->userdata('user_id'));
		}else{
			$data['GetAllShipment'] = $this->ReportModel->get_all_shipment();
		}
		$this->load->view('layouts/header.php');
		$this->load->view('report/report_index', $data);
		$this->load->view('layouts/footer.php', $data);
	}

	public function insert() {
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('user_type', 'Type', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'user_id' => $this->UserModel->generate_user_id(),
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_password' => md5($this->input->post('user_password')),
                'user_status' => $this->input->post('user_status'),
                'user_type' => $this->input->post('user_type'),
			);
			
			$result = $this->UserModel->insert($data);
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
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('user_type', 'Type', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'user_id' => $this->input->post('user_id'),
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_status' => $this->input->post('user_status'),
                'user_type' => $this->input->post('user_type'),
			);
			
			$result = $this->UserModel->update($data);
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

	public function getbyiduser() {
		
		$id = $_GET['id'];
		$data['GetByIdUser'] = $this->UserModel->get_byid_user($id);

		$this->load->view('user/user_update', $data);
	}

	public function delete() {
		
		$id = $_GET['id'];
		$result = $this->UserModel->delete($id);
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