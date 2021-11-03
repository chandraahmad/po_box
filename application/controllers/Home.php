<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('user_email') != NULL) {
			$this->load->model('HomeModel');	
		}else{
			redirect();
		}
	}

	public function index() {
		if($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
			$data['js_p'] = "home.js";
			$data['GetAllPoBox'] = $this->HomeModel->get_all_pobox();
			$data['GetAllTransaction'] = $this->HomeModel->get_all_transaction();
			$data['GetAllUser'] = $this->HomeModel->get_all_user();
			$data['GetIncome'] = $this->HomeModel->get_income();
			$data['GetExpenses'] = $this->HomeModel->get_expenses();
			$this->load->view('layouts/header.php');
			$this->load->view('home/home_index', $data);
			$this->load->view('layouts/footer.php', $data);
		}elseif($this->session->userdata('user_type') == '3'){
			redirect();
		}
	}
}