<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('TransactionModel');
	}
	
	public function index() {
		$data['js_p'] = "transaction.js";
		$data['GetAllPoBox'] = $this->TransactionModel->get_all_pobox();
		$this->load->view('layouts/header_fe.php');
		$this->load->view('transaction/transaction_index', $data);
		$this->load->view('layouts/footer_fe.php', $data);
	}

	public function detail_pobox() {
		$id = @$_GET['id'];
		$data['js_p'] = "transaction.js";
		$data['GetByIdPoBox'] = $this->TransactionModel->get_byid_pobox($id);

		if($data['GetByIdPoBox'] != NULL && $this->session->userdata('user_email') != NULL) {
			$valDate = @$this->TransactionModel->get_byid_transaction('transaction_user', $this->session->userdata('user_id'));
			if (str_replace('-', '', @$valDate->transaction_until_date) <= date('Ymd')) {
				$this->load->view('layouts/header_fe.php');
				$this->load->view('transaction/transaction_pobox', $data);
				$this->load->view('layouts/footer_fe.php', $data);
			}else{
				if (@$this->TransactionModel->get_expired_po_box($id)->selisihDate <= 10) {
					$this->load->view('layouts/header_fe.php');
					$this->load->view('transaction/transaction_pobox', $data);
					$this->load->view('layouts/footer_fe.php', $data);
				}else{
					redirect();	
				}
			}
		}else{
			redirect();
		}
	}

	public function insert() {
		$this->form_validation->set_rules('transaction_pobox', 'Po Box', 'trim|required');
		$this->form_validation->set_rules('transaction_total_price', 'Total Harga Sewa', 'trim|required');
		$this->form_validation->set_rules('transaction_month', 'Bulan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$data['GetByIdCustomer'] = $this->TransactionModel->get_byid_customer($this->session->userdata('user_id'));
			if ($data['GetByIdCustomer'] != NULL) {
				$dateNow = date_create(date('Y-m-d'));
				$dateUntil = date_add($dateNow, date_interval_create_from_date_string($this->input->post('transaction_month')." month"));
				
				$data = array(
					'transaction_id' => $this->TransactionModel->generate_transaction_id(),
					'transaction_pobox' => $this->input->post('transaction_pobox'),
					'transaction_user' => $this->session->userdata('user_id'),
					'transaction_total_price' => str_replace(',', '', $this->input->post('transaction_total_price')),
					'transaction_from_date' => date('Y-m-d'),
					'transaction_until_date' => date_format($dateUntil,"Y-m-d"),
	                'transaction_month' => $this->input->post('transaction_month'),
	                'transaction_status' => '1',
	                'transaction_date' => date('Y-m-d H:i:s'),
				);
				
				$result = $this->TransactionModel->insert($data);
				if ($result == TRUE) {
					$out['status'] = 'true';
					$out['msg_header'] = 'Well done';
					$out['msg'] = 'Data saved successfully';
					$out['url'] = base_url('Transaction/');
				}else{
					$out['status'] = 'false';
					$out['msg_header'] = 'Failed';
					$out['msg'] = 'Connection lost';
				}
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Failed';
				$out['msg'] = 'Go to profile, complete your address';
			}
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
		}
		echo json_encode($out);
	}

	public function upload_transaction() {
		$config['file_name']          	= $this->input->post('transaction_id').'.png';
		$config['upload_path']          = './assets/bukti_pembayaran';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 7000;
        $config['max_height']           = 7000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('transaction_upload')) {
        	$file = $this->upload->data();

        	$data = array(
				'transaction_id' => $this->input->post('transaction_id'),
				'transaction_status' => '2',
				'transaction_date_pay' => date('Y-m-d H:i:s')
			);
			$this->TransactionModel->update($data);

			$data = array(
				'pobox_id' => $this->input->post('transaction_pobox'),
				'pobox_status_sale' => '1'
			);
			$this->TransactionModel->update_pobox($data);
        	// $file['file_name']
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

	public function countPrice() {
		$month = (@$_GET['month'] != NULL ? @$_GET['month'] : 0);
		$pobox_id = @$_GET['pobox_id'];

		$data['GetByIdPoBox'] = $this->TransactionModel->get_byid_pobox($pobox_id);
		if ($data['GetByIdPoBox'] != NULL) {
			$countPrice = $data['GetByIdPoBox']->pobox_price * $month;
			$out['status'] = 'true';
			$out['msg_header'] = 'Well done';
			$out['msg'] = 'Data available';
			$out['data'] = number_format($countPrice);
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Failed';
			$out['msg'] = 'Data not available';
		}
		echo json_encode($out);
	}
}
