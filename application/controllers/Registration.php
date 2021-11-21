<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('RegistrationModel');
	}

	public function index() {
		$datajs['js_p'] = "registration.js";
		$this->load->view('layouts/header.php');
		$this->load->view('registration/registration_index');
		$this->load->view('layouts/footer.php', $datajs);
	}

	public function insert_registration() {
		$this->form_validation->set_rules('user_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_password1', 'Password', 'trim|required');
		$this->form_validation->set_rules('user_password2', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('user_password1') == $this->input->post('user_password2')) {
				
				$data = array(
					'user_id' => $this->RegistrationModel->generate_user_id(),
					'user_name' => $this->input->post('user_name'),
					'user_email' => $this->input->post('user_email'),
					'user_password' => md5($this->input->post('user_password1')),
					'user_type' => '3',
					'user_status' => '0',
					'user_created' => date('Y-m-d H:i:s')
				);
				$result = $this->RegistrationModel->insert($data);

				$this->email_verification($data['user_id']);

				if ($result == TRUE) {
					$out['status'] = 'true';
					$out['msg_header'] = 'Well done';
					$out['msg'] = 'You have successfully registered. Check your email for account verification';
				}else{
					$out['status'] = 'false';
					$out['msg_header'] = 'Failed';
					$out['msg'] = 'Registration failed. Please check your internet connection again';
				}
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Warning';
				$out['msg'] = 'Your password not match';
			}			
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
		}
		echo json_encode($out);
	}

	public function active_account() {
		$user_id = @$this->input->get('user_id');
		$data['data_email'] = $this->RegistrationModel->get_byid_user($user_id);
		if($data['data_email'] != NULL) {
			$data = array(
				'user_id' => $user_id,
				'user_status' => '1'
			);
	
			$this->RegistrationModel->update($data);
			$this->load->view('registration/registration_verification');
		}else{
			$this->load->view('404Notfound');
		}
	}

	public function email_verification($id) {
		$data['data_email'] = $this->RegistrationModel->get_byid_user($id);
		$mailing = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			// 'smtp_user' => 'admin.hris@poslogistics.co.id',
			// 'smtp_pass' => 'Hris0987',
			'smtp_user' => 'helpdesk@poslogistics.co.id',
			'smtp_pass' => 'poslog@2021',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8',
			'wordwrap' => TRUE
		);
		$this->load->library('email');
        $this->email->initialize($mailing);
		$this->email->set_newline("\r\n");
    	$this->email->from($mailing['smtp_user'], 'E-PO BOX');
		$this->email->to($data['data_email']->user_email);
		$this->email->subject('Email Verifictaion E-PO BOX');
		$this->email->message($this->load->view('email_verification.html', $data, true));
		return $this->email->send();
		// echo $this->email->print_debugger();
	}

	public function terms() {
		$datajs['js_p'] = "registration.js";
		$this->load->view('layouts/header.php');
		$this->load->view('registration/registration_term');
		$this->load->view('layouts/footer.php', $datajs);	
	}

	public function test_page() {
		$data['data_email'] = $this->RegistrationModel->get_byid_user('USR21112100001');
		$this->load->view('404Notfound', $data);
	}
}