<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('LoginModel');
	}

	public function index() {
		$datajs['js_p'] = "login.js";
		$this->load->view('layouts/header.php');
		$this->load->view('login/login_index');
		$this->load->view('layouts/footer.php', $datajs);
	}

	public function login() {		
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'user_email' => $this->input->post('user_email'),
				'user_password' => md5($this->input->post('user_password')),
			);
			$result = $this->LoginModel->login($data);

			if ($result != NULL) {
				if ($result->user_status == '1') {
					$data = array(
						'user_id' => $result->user_id,
						'user_name' => $result->user_name,
						'user_email' => $result->user_email,
						'user_password' => $result->user_password,
						'user_status' => $result->user_status,
						'user_type' => $result->user_type
					);
					
					$this->session->set_userdata($data);
					$out['status'] = 'true';
					$out['msg_header'] = 'Successfully';
					$out['msg'] = 'You have successfully logged in';
					$out['url'] = base_url('Home');
				}else{
					$out['status'] = 'false';
					$out['msg_header'] = 'Failed';
					$out['msg'] = 'User does not active';
					$out['url'] = '';
				}
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Failed';
				$out['msg'] = 'Wrong email & password';
				$out['url'] = '';
			}
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
			$out['url'] = '';
		}
		echo json_encode($out);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}
}