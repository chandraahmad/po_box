<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('WelcomeModel');
	}
	
	public function index() {
		$data['js_p'] = "home.js";
		$data['GetAllPoBox'] = $this->WelcomeModel->get_all_pobox();
		$this->load->view('layouts/header_fe.php');
		$this->load->view('welcome/welcome_index', $data);
		$this->load->view('layouts/footer_fe.php', $data);
	}

	public function detail_pobox() {
		$id = @$_GET['id'];
		$data['js_p'] = "home.js";
		$data['GetByIdPoBox'] = $this->WelcomeModel->get_byid_pobox($id);
		if($data['GetByIdPoBox'] != NULL) {
			$this->load->view('layouts/header_fe.php');
			$this->load->view('welcome/welcome_pobox', $data);
			$this->load->view('layouts/footer_fe.php', $data);
		}else{
			redirect();
		}
	}
}
