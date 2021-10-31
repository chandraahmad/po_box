<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct() {
		parent::__construct();
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
					'user_status' => '1'
				);
				$result = $this->RegistrationModel->insert($data);

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

	public function terms() {
		$datajs['js_p'] = "registration.js";
		$this->load->view('layouts/header.php');
		$this->load->view('registration/registration_term');
		$this->load->view('layouts/footer.php', $datajs);	
	}
}