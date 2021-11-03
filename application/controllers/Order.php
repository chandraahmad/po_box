<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
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
            'transaction_status' => '3',
            'transaction_date_confirm' => date('Y-m-d H:i:s')
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
}