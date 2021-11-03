<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('user_email') != NULL) {
            $this->load->model('CustomerModel');	
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "customer.js";
        $data['GetAllCustomer'] = $this->CustomerModel->get_all_customer();
        $this->load->view('layouts/header.php');
        $this->load->view('customer/customer_index', $data);
        $this->load->view('layouts/footer.php', $data);
	}

	public function insert() {
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('customer_pic', 'PIC', 'trim|required');
        $this->form_validation->set_rules('customer_contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('customer_status', 'Status', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'customer_id' => $this->CustomerModel->generate_customer_id(),
                'customer_name' => $this->input->post('customer_name'),
                'customer_address' => $this->input->post('customer_address'),
                'customer_pic' => $this->input->post('customer_pic'),
                'customer_contact' => $this->input->post('customer_contact'),
                'customer_email' => $this->input->post('customer_email'),
                'customer_status' => $this->input->post('customer_status'),
                'customer_user_id' => $this->session->userdata('user_id')
			);
			
			$result = $this->CustomerModel->insert($data);
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
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('customer_pic', 'PIC', 'trim|required');
        $this->form_validation->set_rules('customer_contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('customer_status', 'Status', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'customer_id' => $this->input->post('customer_id'),
                'customer_name' => $this->input->post('customer_name'),
                'customer_address' => $this->input->post('customer_address'),
                'customer_pic' => $this->input->post('customer_pic'),
                'customer_contact' => $this->input->post('customer_contact'),
                'customer_email' => $this->input->post('customer_email'),
                'customer_status' => $this->input->post('customer_status')
			);
			
			$result = $this->CustomerModel->update($data);
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

	public function getbyidcustomer() {
		
		$id = $_GET['id'];
		$data['GetByIdCustomer'] = $this->CustomerModel->get_byid_customer($id);

		$this->load->view('customer/customer_update', $data);
	}

	public function delete() {
		
		$id = $_GET['id'];
		$result = $this->CustomerModel->delete($id);
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