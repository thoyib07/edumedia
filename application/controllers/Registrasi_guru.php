<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_guru extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		// $data['header_menu'] = $this->load->view('header_menu','',true);
		// $data['footer'] = $this->load->view('footer','',true);
		// $data['content'] = $this->load->view('page/login',true);
		$this->load->view('page/registrasi_guru');
	}
}
