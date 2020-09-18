<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_squrity extends CI_Model {
	
	public function getsqurity(){
		$id = $this->session->userdata('id_murid');
		// var_dump($id);
		// die();
		if (empty($id)) {
			$this->session->sess_destroy();
			redirect('index.php/login');
		}
	}
}
