<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('ForgotpasswordModel');
	}

	public function index() {
		$datajs['js_p'] = "forgotpassword.js";
		$this->load->view('layouts/header.php');
		$this->load->view('forgotpassword/forgotpassword_index');
		$this->load->view('layouts/footer.php', $datajs);
	}

	public function update_forgotpassword() {
		$this->form_validation->set_rules('user_id', 'User Id', 'trim|required');
		$this->form_validation->set_rules('user_password1', 'Password', 'trim|required');
		$this->form_validation->set_rules('user_password2', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('user_password1') == $this->input->post('user_password2')) {
				
				$data = array(
					'user_id' => $this->input->post('user_id'),
                    'user_password' => md5($this->input->post('user_password1')),
				);
				$result = $this->ForgotpasswordModel->update($data);

				if ($result == TRUE) {
					$out['status'] = 'true';
					$out['msg_header'] = 'Well done';
					$out['msg'] = 'Data saved successfully.';
				}else{
					$out['status'] = 'false';
					$out['msg_header'] = 'Failed';
					$out['msg'] = 'Forgot password failed. Please check your internet connection again';
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

    public function insert_forgotpassword() {
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
            $data['getByEmailUser'] = $this->ForgotpasswordModel->get_byemail_user($this->input->post('user_email'));

			if ($data['getByEmailUser'] != NULL) {

				$result = $this->email_forgotpassword($data['getByEmailUser']->user_id);

				if ($result == TRUE) {
					$out['status'] = 'true';
					$out['msg_header'] = 'Well done';
					$out['msg'] = 'Check your email for renew password';
				}else{
					$out['status'] = 'false';
					$out['msg_header'] = 'Failed';
					$out['msg'] = 'Forgot password failed. Please check your internet connection again';
				}
			}else{
				$out['status'] = 'false';
				$out['msg_header'] = 'Warning';
				$out['msg'] = 'Your email is not registered';
			}			
		}else{
			$out['status'] = 'false';
			$out['msg_header'] = 'Warning';
			$out['msg'] = validation_errors();
		}
		echo json_encode($out);
	}

	public function renew_password() {
		$user_id = @$this->input->get('user_id');
		$data['getByIdUser'] = $this->ForgotpasswordModel->get_byid_user($user_id);
		if($data['getByIdUser'] != NULL) {
            $datajs['js_p'] = "forgotpassword.js";
		    $this->load->view('layouts/header.php');
            $this->load->view('forgotpassword/forgotpassword_newpassword', $data);
            $this->load->view('layouts/footer.php', $datajs);
		}else{
			$this->load->view('404Notfound');
		}
	}

	public function email_forgotpassword($id) {
		$data['data_email'] = $this->ForgotpasswordModel->get_byid_user($id);
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
		$this->email->subject('Renew Password Account  E-PO BOX');
		$this->email->message($this->load->view('email_forgotpassword.html', $data, true));
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