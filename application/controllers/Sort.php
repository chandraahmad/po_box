<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sort extends CI_Controller {
    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('SortModel');
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "sort.js";
		$data['GetAllPoBox'] = $this->SortModel->get_all_pobox();
		$this->load->view('layouts/header.php');
		$this->load->view('sort/sort_index', $data);
		$this->load->view('layouts/footer.php', $data);
	}

	public function detail() {
		$data['js_p'] = "sort.js";
		$id = @$_GET['pobox_id'];
		$data['GetByIdPoBox'] = $this->SortModel->get_byid_pobox($id);
		if ($data['GetByIdPoBox'] != NULL) {
			$data['GetAllByIdShipment'] = $this->SortModel->get_all_byid_shipment($id);
			$this->load->view('layouts/header.php');
			$this->load->view('sort/sort_detail', $data);
			$this->load->view('layouts/footer.php', $data);
		}else{
			redirect();
		}
	}

	public function insert() {
		$this->form_validation->set_rules('shipment_barcode', 'Barcode / Resi Number', 'trim|required|is_unique[shipment.shipment_barcode]');

		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'shipment_id' => $this->SortModel->generate_shipment_id(),
                'shipment_barcode' => $this->input->post('shipment_barcode'),
                'shipment_pobox' => $this->input->post('shipment_pobox'),
                'shipment_officer' => $this->session->userdata('user_id'),
                'shipment_date_entry' => date('Y-m-d H:i:s')
			);
			
			$result = $this->SortModel->insert($data);
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

	public function delete() {
		
		$id = $_GET['id'];
		$result = $this->SortModel->delete($id);
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