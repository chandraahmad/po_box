<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('ProfileModel');
		}else{
			redirect();
		}
    }
    
    public function index() {
		$data['js_p'] = "profile.js";
		$data['GetByIdUser'] = $this->ProfileModel->get_byid_user($this->session->userdata('user_id'));
        $data['GetByIdCustomer'] = $this->ProfileModel->get_byid_customer($this->session->userdata('user_id'));
		$this->load->view('layouts/header.php');
		$this->load->view('profile/profile_index', $data);
		$this->load->view('layouts/footer.php', $data);
	}

	public function update() {
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('customer_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('customer_contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Compay Email', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			
			$data_customer = array(
				'customer_user_id' => $this->session->userdata('user_id'),
                'customer_name' => $this->input->post('customer_name'),
                'customer_address' => $this->input->post('customer_address'),
                'customer_contact' => $this->input->post('customer_contact'),
                'customer_email' => $this->input->post('customer_email')
			);
			
			$this->ProfileModel->update_customer($data_customer);

            $data = array(
				'user_id' => $this->session->userdata('user_id'),
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
			);
			
			$result = $this->ProfileModel->update($data);
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

    public function update_password() {
		$this->form_validation->set_rules('user_password_old', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('user_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('user_password_retry', 'Retry New Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$data['GetByIdUser'] = $this->ProfileModel->get_byid_user($this->session->userdata('user_id'));
            if($data['GetByIdUser']->user_password == md5($this->input->post('user_password_old'))) {
                if($this->input->post('user_password') == $this->input->post('user_password_retry')) {
                    $data = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'user_password' => md5($this->input->post('user_password'))
                    );
                    
                    $result = $this->ProfileModel->update($data);
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
                    $out['msg_header'] = 'Failed';
                    $out['msg'] = 'Password Not Match';
                }
            }else{
                $out['status'] = 'false';
                $out['msg_header'] = 'Failed';
                $out['msg'] = 'Worng Password';
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