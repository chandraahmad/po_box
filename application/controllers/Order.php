<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('OrderModel');
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "order.js";
		$data['GetAllTransaction'] = $this->OrderModel->get_all_transaction();
		$this->load->view('layouts/header.php');
		$this->load->view('order/order_index', $data);
		$this->load->view('layouts/footer.php', $data);
	}

	public function confirmPayment() {
		
		$data['GetByIdTransaction'] = $this->OrderModel->get_byid_transaction(@$_GET['id']);

		$data = array(
			'pobox_id' => $data['GetByIdTransaction']->transaction_pobox,
			'pobox_status_sale' => '2'
		);
		$this->OrderModel->update_pobox($data);

		$data = array(
			'transaction_id' => @$_GET['id'],
            'transaction_status' => '3'
		);
		
		$result = $this->OrderModel->update($data);
		if ($result == TRUE) {
			$out['status'] = 'true';
			$out['msg_header'] = 'Well done';
			$out['msg'] = 'Data saved successfully';
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Failed';
			$out['msg'] = 'Connection lost';
		}
		echo json_encode($out);
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
}