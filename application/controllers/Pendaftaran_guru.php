<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_guru extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('model_registrasi_guru');   
    }

	public function index()
	{
		// $data['header_menu'] = $this->load->view('header_menu','',true);
		// $data['footer'] = $this->load->view('footer','',true);
		// $data['content'] = $this->load->view('page/login',true);
		$this->load->view('page/pendaftaran_guru');
	}

	public function ajax_save()
	{
        $this->_validate();
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H-i-s');  
        $nama_lengkap =  $this->input->post('nama_lengkap');
        $email =  $this->input->post('email');
        $kata_sandi =  $this->input->post('kata_sandi');

        $data_guru = array(
        	'nama_lengkap' => strtoupper($nama_lengkap),
        	'email' => $email,
        	'create_date' => $date_now,
        );

        $simpan_data_guru = $this->model_registrasi_guru->save('m_guru', $data_guru);

        if ($simpan_data_guru) {
			$data_user = array(
				'id_murid' => $simpan_data_guru,
				'email' => $email,
				'password' => md5($kata_sandi),
				'level' => 'Murid',
				'create_date' => $date_now,
	        );        	

        	$simpan_data_user = $this->model_registrasi_guru->save('m_user', $data_user);

        	if ($simpan_data_user) {
	            $data['status'] = true;
	            $data['pesan'] = 'Sukses Daftar';

	            echo json_encode($data);
        	}else{
        		$data['status'] = false;
	            $data['pesan'] = 'Gagal Daftar';

	            echo json_encode($data);
        	}
        }
	}

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        // $data['error_class'] = array();
        $data['status'] = TRUE;
        
        if($this->input->post('nama_lengkap') == ''){
            $data['error_string']['nama_lengkap'] = 'nama lengkap harus di isi';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('email') == ''){
            $data['error_string']['email'] = 'email harus di isi';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('kata_sandi') == ''){
            $data['error_string']['kata_sandi'] = 'kata sandi harus di isi';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('konfirmasi_kata_sandi') == '0'){
            $data['error_string']['konfirmasi_kata_sandi'] = 'konfirmasi sandi harus di isi';
            $data['status'] = FALSE;
        }
        
        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }
}
