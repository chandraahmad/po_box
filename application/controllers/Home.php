<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('HomeModel');	
		}else{
			redirect();
		}
	}

	public function index() {
		if($this->session->userdata('user_type') == '1') {
			$data['js_p'] = "home.js";
			$data['GetAllPoBox'] = $this->HomeModel->get_all_pobox();
			// $data['GetAllEvent'] = $this->HomeModel->get_all_event();
			// $data['GetAllFloorGuest'] = $this->HomeModel->get_all_floorguest();
			$this->load->view('layouts/header.php');
			$this->load->view('home/home_index', $data);
			$this->load->view('layouts/footer.php', $data);
		}elseif($this->session->userdata('user_type') == '4'){
			redirect();
		}
	}
}