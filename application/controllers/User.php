<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('User_model','user');

	}

	public function index(){
		$data['mainpage'] = 'mainpage/home/home';
		$this->load->view('index',$data);
	}

}