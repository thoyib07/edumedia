<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller {

	function __construct()

    {

        parent::__construct();

        $this->load->model('model_mata_pelajaran');
        
        $this->load->model('model_squrity');  

        $this->model_squrity->getsqurity();   
		
    }

    public function get_mata_pelajaran_by_id_tingkat_id_jurusan_kelas(){
        
    	$kelas = $this->session->userdata('kelas');

    	$id_tingkat = $this->session->userdata('id_tingkat');
    		
    	$id_jurusan = $this->session->userdata('id_jurusan');

    	$get_mata_pelajaran_kelas_id_tingkat_id_jurusan = $this->model_mata_pelajaran->get_by_id_tingkat_id_jurusan_kelas($kelas, $id_tingkat, $id_jurusan);

    	if ($get_mata_pelajaran_kelas_id_tingkat_id_jurusan) {
    		
    		 $data['status'] = true;
             
             $data['misage'] = 'sukses';
             
             $data['data'] = $get_mata_pelajaran_kelas_id_tingkat_id_jurusan;

    	} else {

             $data['status'] = false;
             
             $data['misage'] = 'gagal';
             
             $data['data'] = '-';

    	}

         // header('Content-Type: application/json');
        
         echo json_encode($data);

    }

}

